@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}"
                        method="POST">
                        @csrf
                        @isset($role)
                        @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Role</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group local-forms">
                                    <label>Role Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter role name" value="{{ old('name', $role->name ?? '') }}" />
                                    @error('name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Permissions</span></h5>
                            {{-- </div> --}}
                            {{-- <div class="col-12"> --}}
                                {{-- <div class=""> --}}
                                    @if ($permissions && $permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <span style="margin-right: 10px">
                                                <input {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} class="form-check-input" id="permission-{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                                <label for="permission-{{ $permission->id }}"><h6>{{ $permission->name }}</h6></label>
                                            </span>

                                        @endforeach
                                    @endif
                                {{-- </div> --}}

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ isset($role) ? 'Save' : 'Submit'
                                    }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
