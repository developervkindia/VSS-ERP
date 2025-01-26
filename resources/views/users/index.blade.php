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
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">User</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                {{-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                                    Download</a> --}}
                                <a href="{{ route('users.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                {{-- @dd($user->role) --}}
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><a>{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        {{ $role->name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('users.edit', $role->id) }}"
                                                class="btn btn-sm bg-danger-light" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                data-href="{{ route('users.destroy', $role->id) }}"
                                                class="btn btn-sm bg-danger-light confirm-delete" data-name="Role"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                            @canImpersonate($guard = null)
    <a href="{{ route('impersonate', $user->id) }}">Login As</a>
@endCanImpersonate
                                            {{-- @if(auth()->user()->hasRole('Admin')) --}}
                      {{-- <a href="{{ route('users.login-as', $user->id) }}" class="btn btn-sm bg-danger-light" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Login As">Login As</a> --}}
                    {{-- @endif --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
