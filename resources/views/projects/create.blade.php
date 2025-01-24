@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Project</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Project</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST">
                        @csrf
                        @isset($project)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Project Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Project Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter project title" value="{{ old('title', $project->title ?? '') }}" />
                                    @error('title')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Type of Project</label>
                                    @php
                                        $projecTypes = ['public', 'private'];
                                    @endphp
                                    <select class="form-control select @error('type') is-invalid @enderror" name="type" id="exampleFormControlSelect1">
                                        <option selected disabled>Select Project</option>
                                        @foreach ($projecTypes as $projecType)
                                            <option value="{{ $projecType }}" {{ old('type', $project->type ?? '') ? 'selected' : '' }}>{{ ucwords($projecType) }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" id="start_date" class="form-control datetimepicker @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $project->start_date ?? '') }}" />
                                    @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="text" id="end_date" class="form-control datetimepicker @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $project->end_date ?? '') }}" />
                                    @error('end_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="editor" cols="30" rows="10">{{ old('description', $project->description ?? '') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ isset($project) ? 'Save' : 'Submit' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection