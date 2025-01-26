@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                   <h3 class="page-title">{{ $title ?? 'Performance Evaluations' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Performance Evaluations</li>
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
                                    <h3 class="page-title">Performance Evaluations</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('performance_evaluations.create') }}" class="btn btn-primary"><i
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
                                        <th>User</th>
                                        <th>Evaluation Cycle</th>
                                        <th>Evaluation Date</th>
                                        <th>Overall Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluations as $key => $evaluation)
                                        <tr>
                                            <td>{{ $evaluations->firstItem() + $key }}</td>
                                            <td><a href="{{ route('performance_evaluations.show', $evaluation->id) }}">{{ $evaluation->user->name ?? '' }}</a></td>
                                            <td>{{ $evaluation->evaluation_cycle ?? '' }}</td>
                                             <td>{{ $evaluation->evaluation_date ?? '' }}</td>
                                            <td>{{ $evaluation->overall_rating ?? '' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                     <a href="{{ route('performance_evaluations.show', $evaluation->id) }}" class="btn btn-sm bg-info-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('performance_evaluations.edit', $evaluation->id) }}"
                                                        class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0)"
                                                        data-href="{{ route('performance_evaluations.destroy', $evaluation->id) }}"
                                                        class="btn btn-sm bg-danger confirm-delete" data-name="Performance Evaluation"
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
                            {{ $evaluations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
