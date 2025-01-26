@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Projects' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Projects</li>
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
                                    <h3 class="page-title">Projects</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('projects.create') }}" class="btn btn-primary"><i
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
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Type</th>
                                         <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key => $project)
                                        <tr>
                                            <td>{{ $projects->firstItem() + $key }}</td>
                                            <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></td>
                                            <td>{{ $project->user->name ?? '' }}</td>
                                            <td>{{ $project->start_date ?? '' }}</td>
                                            <td>{{ $project->end_date ?? '' }}</td>
                                            <td>{{ ucfirst($project->type) }}</td>
                                            <td>{{ ucfirst($project->status) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                     <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm bg-info-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('projects.edit', $project->id) }}"
                                                        class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0)"
                                                        data-href="{{ route('projects.destroy', $project->id) }}"
                                                        class="btn btn-sm bg-danger confirm-delete" data-name="Project"
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
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
