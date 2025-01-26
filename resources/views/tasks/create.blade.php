@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? (isset($task) ? 'Edit Task' : 'Create Task') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Tasks</a></li>
                        <li class="breadcrumb-item active">{{ isset($task) ? 'Edit' : 'Create' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}"
                            method="POST">
                            @csrf
                            @isset($task)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Task Information</span></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter name" value="{{ old('name', $task->name ?? '') }}" required>
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Project <span class="text-danger">*</span></label>
                                            <select class="form-control @error('project_id') is-invalid @enderror" name="project_id" required>
                                                <option value="">Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}"
                                                        {{ old('project_id', isset($task) ? $task->project_id : '') == $project->id ? 'selected' : '' }}>
                                                        {{ ucwords($project->title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('project_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Assigned To</label>
                                          <select class="form-control @error('assigned_to') is-invalid @enderror" name="assigned_to">
                                                <option value="">Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('assigned_to', isset($task) ? $task->assigned_to : '') == $user->id ? 'selected' : '' }}>
                                                        {{ ucwords($user->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @error('assigned_to')
                                          <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Due Date</label>
                                        <input type="date" name="due_date"
                                            class="form-control @error('due_date') is-invalid @enderror"
                                            value="{{ old('due_date', isset($task) && $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}">
                                        @error('due_date')
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
                                                        {{ old('status', isset($task) ? $task->status : '') == $key ? 'selected' : '' }}>
                                                        {{ ucwords($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter description" rows="4">{{ old('description', $task->description ?? '') }}</textarea>
                                        @error('description')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($task) ? 'Save' : 'Submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
