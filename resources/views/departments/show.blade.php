@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Department Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
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
                                        <td>{{ $department->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $department->description ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                           <a href="{{ route('departments.edit', $department->id) }}"
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
