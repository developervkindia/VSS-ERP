@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Task Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Tasks</a></li>
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
                                        <th>Name</th>
                                        <td>{{ $task->name }}</td>
                                    </tr>
                                     <tr>
                                        <th>Project</th>
                                         <td>{{ $task->project->title ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Assigned To</th>
                                         <td>{{ $task->assignedToUser->name ?? 'Not Assigned' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Due Date</th>
                                        <td>{{ $task->due_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ ucfirst($task->status) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $task->description ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <div class="mt-4">
                           <a href="{{ route('tasks.edit', $task->id) }}"
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
