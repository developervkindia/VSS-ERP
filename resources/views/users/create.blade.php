@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">User</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
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
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" value="{{ old('name', $user->name ?? '') }}" />
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control datetimepicker @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter email"/>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Role of User</label>
                                    <select class="form-control" id="role" name="role" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ old('role', $role->name ?? '') ? 'selected' : '' }}>{{ ucwords($role->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
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
