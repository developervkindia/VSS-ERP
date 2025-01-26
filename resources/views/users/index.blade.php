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
                                    <th>Department</th>
                                    <th>Job Title</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td><a>{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                    <td>{{ $user->employee->department->name ?? 'N/A' }}</td>
                                    <td>{{ $user->employee->job_title ?? 'N/A' }}</td>
                                     <td>{{ $user->addresses->first()->city ?? 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm bg-info-light" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                              <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="Edit">
                                                   <i class="fas fa-edit"></i>
                                               </a>

                                            <a href="javascript:void(0)"
                                                data-href="{{ route('users.destroy', $user->id) }}"
                                                class="btn btn-sm bg-danger confirm-delete" data-name="User"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @canImpersonate($guard = null)
                                                <a href="{{ route('impersonate', $user->id) }}" class="btn btn-sm bg-primary-light"  data-bs-toggle="tooltip" data-bs-placement="top" title="Login As">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                </a>
                                            @endCanImpersonate
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
