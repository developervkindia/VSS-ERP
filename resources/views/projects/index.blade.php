@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Project</li>
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
                                <h3 class="page-title">Project</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                {{-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> --}}
                                <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>S. No.</th>
                                    <th>Project Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $key => $project)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><a>{{ $project->title }}</a></td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>{!! \Str::limit($project->description, 50) !!}</td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm bg-danger-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" data-href="{{ route('projects.destroy', $project->id) }}" class="btn btn-sm bg-danger-light confirm-delete" data-name="Project" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
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
