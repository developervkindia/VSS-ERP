@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ isset($user) ? 'Edit User' : 'Create User' }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">{{ isset($user) ? 'Edit' : 'Create' }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>User Information</span></h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter name" value="{{ old('name', $user->name ?? '') }}" required/>
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Role of User<span class="text-danger">*</span></label>
                                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ old('role', isset($user) ? $user->getRoleNames()->first() : '') === $role->name ? 'selected' : '' }}>
                                                {{ ucwords($role->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label for="email">Email <span class="login-danger">*</span></label>
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email ?? '') }}" placeholder="Enter email"
                                         required oninput="validateEmail(this)"/>
                                         <small id="emailHelp" class="form-text text-danger" style="display:none">Please enter a valid email format (e.g., example@example.com)</small>

                                         @error('email')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Enter phone" value="{{ old('phone', $user->phone ?? '') }}"
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '');" required/>
                                     @error('phone')
                                         <span class="text-danger text-sm">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Hire Date<span class="text-danger">*</span></label>
                                    <input type="date" name="hire_date"
                                        class="form-control @error('hire_date') is-invalid @enderror"
                                        value="{{ old('hire_date', $employee->hire_date ?? '') }}"  required/>
                                    @error('hire_date')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Job Title<span class="text-danger">*</span></label>
                                    <input type="text" name="job_title"
                                        class="form-control @error('job_title') is-invalid @enderror"
                                        placeholder="Enter job title"
                                        value="{{ old('job_title', $employee->job_title ?? '') }}" required/>
                                    @error('job_title')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                               @php
                                   $departments = App\Models\Department::all();
                               @endphp
                                <div class="form-group local-forms">
                                    <label>Department<span class="text-danger">*</span></label>
                                    <select class="form-control @error('department_id') is-invalid @enderror"
                                        id="department_id" name="department_id" required>
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department_id', isset($employee) ? $employee->department_id : '') == $department->id ? 'selected' : '' }}>
                                                {{ ucwords($department->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Street Address<span class="text-danger">*</span></label>
                                        <input type="text" name="street_address" class="form-control @error('street_address') is-invalid @enderror" placeholder="Enter street address" value="{{ old('street_address', $address->street_address ?? '') }}" required/>
                                         @error('street_address')
                                             <span class="text-danger text-sm">{{ $message }}</span>
                                         @enderror
                                    </div>
                              </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>City<span class="text-danger">*</span></label>
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Enter city" value="{{ old('city', $address->city ?? '') }}" required/>
                                         @error('city')
                                             <span class="text-danger text-sm">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>State<span class="text-danger">*</span></label>
                                        <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="Enter state" value="{{ old('state', $address->state ?? '') }}"  required/>
                                         @error('state')
                                             <span class="text-danger text-sm">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Postal Code<span class="text-danger">*</span></label>
                                        <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Enter postal code" value="{{ old('postal_code', $address->postal_code ?? '') }}"  required/>
                                         @error('postal_code')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Country<span class="text-danger">*</span></label>
                                        <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Enter country" value="{{ old('country', $address->country ?? '') }}" required />
                                         @error('country')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Save' : 'Submit' }}</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

   <script>
       function validateEmail(input) {
         var emailHelp = document.getElementById('emailHelp');
         var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

         if (emailRegex.test(input.value)) {
             emailHelp.style.display = 'none'; // Hide message if email is valid
         } else {
            emailHelp.style.display = 'block'; // Show message if email is invalid
         }
    }
   </script>
   @push('scripts')

   @endpush
