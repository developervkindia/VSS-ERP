@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Job Positions</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Job Positions</li>
                </ul>
            </div>
        </div>
    </div>
     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                     <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Jobs</h3>
                            </div>
                             <div class="col-auto text-end float-end ms-auto download-grp">
                                 <a href="{{ route('jobs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                     </div>
                    <div class="table-responsive">
                       <table
                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>S. No.</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                      <th>Location Type</th>
                                    <th>Closing Date</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $key=>$job)
                                <tr>
                                    <td>{{ $jobs->firstItem() + $key}}</td>
                                     <td><a href="#">{{$job->title}}</a></td>
                                     <td>{{ $job->department->name ?? 'N/A' }}</td>
                                     <td>{{ $job->location_type}}</td>
                                    <td>{{$job->closing_date}}</td>
                                       <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('jobs.edit', $job->id) }}"
                                               class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)"
                                                data-href="{{ route('jobs.destroy', $job->id) }}"
                                                class="btn btn-sm bg-danger confirm-delete" data-name="job"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                         </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                          <div class="mt-4">
                                  {{ $jobs->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
