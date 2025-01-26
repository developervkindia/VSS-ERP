@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Leave Requests' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave Requests</li>
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
                                    <h3 class="page-title">Leave Requests</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('leave_requests.create') }}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>No.</th>
                                        <th>Employee</th>
                                        <th>Leave Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaveRequests as $key => $leaveRequest)
                                        <tr>
                                            <td>{{ $leaveRequests->firstItem() + $key }}</td>
                                            <td><a href="{{ route('leave_requests.show', $leaveRequest->id) }}">{{ $leaveRequest->user->name ?? '' }}</a></td>
                                             <td>{{ $leaveRequest->leave_type ?? '' }}</td>
                                            <td>{{ $leaveRequest->start_date ?? '' }}</td>
                                            <td>{{ $leaveRequest->end_date ?? '' }}</td>
                                            <td>{{ ucfirst($leaveRequest->status) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                     <a href="{{ route('leave_requests.show', $leaveRequest->id) }}" class="btn btn-sm bg-info-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('leave_requests.edit', $leaveRequest->id) }}"
                                                        class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0)"
                                                        data-href="{{ route('leave_requests.destroy', $leaveRequest->id) }}"
                                                        class="btn btn-sm bg-danger confirm-delete" data-name="Leave Request"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $leaveRequests->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
