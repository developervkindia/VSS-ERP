@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Project Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
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
                                        <th>Title</th>
                                        <td>{{ $project->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>User</th>
                                        <td>{{ $project->user->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $project->start_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $project->end_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ ucfirst($project->type) }}</td>
                                    </tr>
                                    <tr>
                                         <th>Status</th>
                                        <td>{{ ucfirst($project->status) }}</td>
                                     </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $project->description ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <div class="mt-4">
                           <a href="{{ route('projects.edit', $project->id) }}"
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
