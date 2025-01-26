@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? (isset($leaveRequest) ? 'Edit Leave Request' : 'Create Leave Request') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('leave_requests.index') }}">Leave Requests</a></li>
                        <li class="breadcrumb-item active">{{ isset($leaveRequest) ? 'Edit' : 'Create' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($leaveRequest) ? route('leave_requests.update', $leaveRequest->id) : route('leave_requests.store') }}"
                            method="POST">
                            @csrf
                            @isset($leaveRequest)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Leave Request Information</span></h5>
                                </div>
                                  <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Employee <span class="text-danger">*</span></label>
                                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                                <option value="">Select Employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}"
                                                        {{ old('user_id', isset($leaveRequest) ? $leaveRequest->user_id : '') == $employee->id ? 'selected' : '' }}>
                                                        {{ ucwords($employee->user->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Leave Type <span class="text-danger">*</span></label>
                                        <input type="text" name="leave_type"
                                            class="form-control @error('leave_type') is-invalid @enderror"
                                            placeholder="Enter leave type" value="{{ old('leave_type', $leaveRequest->leave_type ?? '') }}" required>
                                        @error('leave_type')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Start Date<span class="text-danger">*</span></label>
                                        <input type="date" name="start_date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                           value="{{ old('start_date', isset($leaveRequest) && $leaveRequest->start_date ? \Carbon\Carbon::parse($leaveRequest->start_date)->format('Y-m-d') : '') }}" required>
                                        @error('start_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>End Date<span class="text-danger">*</span></label>
                                         <input type="date" name="end_date"
                                            class="form-control @error('end_date') is-invalid @enderror"
                                             value="{{ old('end_date', isset($leaveRequest) && $leaveRequest->end_date ? \Carbon\Carbon::parse($leaveRequest->end_date)->format('Y-m-d') : '') }}" required>
                                        @error('end_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Select Status</option>
                                                @foreach ($statuses as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ old('status', isset($leaveRequest) ? $leaveRequest->status : '') == $key ? 'selected' : '' }}>
                                                        {{ ucwords($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Approved By</label>
                                            <select class="form-control @error('approved_by') is-invalid @enderror" name="approved_by">
                                                <option value="">Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('approved_by', isset($leaveRequest) ? $leaveRequest->approved_by : '') == $user->id ? 'selected' : '' }}>
                                                        {{ ucwords($user->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('approved_by')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Notes</label>
                                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror"
                                            placeholder="Enter notes" rows="4">{{ old('notes', $leaveRequest->notes ?? '') }}</textarea>
                                        @error('notes')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($leaveRequest) ? 'Save' : 'Submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
