@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Leave Request Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('leave_requests.index') }}">Leave Requests</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Employee</th>
                                         <td>{{ $leaveRequest->employee->user->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Type</th>
                                        <td>{{ $leaveRequest->leave_type ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $leaveRequest->start_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $leaveRequest->end_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                         <th>Status</th>
                                        <td>{{ ucfirst($leaveRequest->status) }}</td>
                                     </tr>
                                    <tr>
                                        <th>Approved By</th>
                                        <td>{{ $leaveRequest->approvedBy->name ?? 'Not Approved Yet' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Notes</th>
                                        <td>{{ $leaveRequest->notes ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                           <a href="{{ route('leave_requests.edit', $leaveRequest->id) }}"
                             class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit">
                           <i class="fas fa-edit"></i> Edit
                             </a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
