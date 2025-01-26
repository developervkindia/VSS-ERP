@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? (isset($project) ? 'Edit Project' : 'Create Project') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active">{{ isset($project) ? 'Edit' : 'Create' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}"
                            method="POST">
                            @csrf
                            @isset($project)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Project Information</span></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter title" value="{{ old('title', $project->title ?? '') }}" required>
                                        @error('title')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>User <span class="text-danger">*</span></label>
                                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                                <option value="">Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('user_id', isset($project) ? $project->user_id : '') == $user->id ? 'selected' : '' }}>
                                                        {{ ucwords($user->name) }}
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
                                        <label>Start Date</label>
                                        <input type="date" name="start_date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                            value="{{ old('start_date', isset($project) && $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : '') }}">
                                        @error('start_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>End Date</label>
                                        <input type="date" name="end_date"
                                            class="form-control @error('end_date') is-invalid @enderror"
                                            value="{{ old('end_date', isset($project) && $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '') }}">
                                        @error('end_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Type<span class="text-danger">*</span></label>
                                            <select class="form-control @error('type') is-invalid @enderror" name="type" required>
                                                <option value="">Select Type</option>
                                                @foreach ($types as $key => $type)
                                                    <option value="{{ $key }}"
                                                        {{ old('type', isset($project) ? $project->type : '') == $key ? 'selected' : '' }}>
                                                        {{ ucwords($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                                <small class="text-danger">{{ $message }}</small>
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
                                                        {{ old('status', isset($project) ? $project->status : '') == $key ? 'selected' : '' }}>
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
                                            placeholder="Enter description" rows="4">{{ old('description', $project->description ?? '') }}</textarea>
                                        @error('description')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($project) ? 'Save' : 'Submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
