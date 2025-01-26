@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                   <h3 class="page-title">{{ $title ?? 'Performance Evaluation Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('performance_evaluations.index') }}">Performance Evaluations</a></li>
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
                                        <th>User</th>
                                        <td>{{ $performanceEvaluation->user->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Evaluation Cycle</th>
                                        <td>{{ $performanceEvaluation->evaluation_cycle ?? '' }}</td>
                                    </tr>
                                    <tr>
                                         <th>Evaluation Date</th>
                                         <td>{{ $performanceEvaluation->evaluation_date ?? '' }}</td>
                                     </tr>
                                    <tr>
                                        <th>Overall Rating</th>
                                        <td>{{ $performanceEvaluation->overall_rating ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Notes</th>
                                        <td>{{ $performanceEvaluation->notes ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                           <a href="{{ route('performance_evaluations.edit', $performanceEvaluation->id) }}"
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
