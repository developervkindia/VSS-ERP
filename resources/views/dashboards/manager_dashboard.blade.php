@extends('layouts.main')

@section('content')
    <div class="content container-fluid">

         <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                   <div class="page-sub-header">
                     <h3 class="page-title">Welcome Manager!</h3>
                       <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                            <li class="breadcrumb-item active">Manager</li>
                        </ul>
                   </div>
                </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                             <div class="db-info">
                                 <h6>Total Team Members</h6>
                                   <h3 class="text-3xl font-bold mt-2">{{ $totalTeamMembers }}</h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-users text-white text-4xl"></i>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Ongoing Projects</h6>
                                 <h3 class="text-3xl font-bold mt-2">{{ $ongoingProjects }}</h3>
                            </div>
                             <div class="db-icon">
                                <i class="fas fa-project-diagram text-white text-4xl"></i>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                 <div class="card bg-comman w-100">
                    <div class="card-body">
                       <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Pending Leave Requests</h6>
                                 <h3 class="text-3xl font-bold mt-2">{{ $pendingLeaveRequests }}</h3>
                            </div>
                           <div class="db-icon">
                               <i class="fas fa-calendar-times text-white text-4xl"></i>
                            </div>
                       </div>
                    </div>
                 </div>
             </div>
        </div>

        <div class="row">
                <div class="col-12 col-lg-12 col-xl-12 d-flex">
                    <div class="card flex-fill comman-shadow">
                         <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                   <h5 class="card-title">Team Tasks</h5>
                               </div>
                            </div>
                         </div>
                         <div class="card-body">
                            <div class="table-responsive lesson">
                                <table class="table table-center">
                                    <thead>
                                         <tr>
                                               <th>Task Name</th>
                                                <th>Project</th>
                                                <th>Assigned To</th>
                                               <th>Status</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($tasks as $task)
                                        <tr>
                                              <td>{{ $task->name ?? '' }}</td>
                                              <td>{{ $task->project->title ?? '' }}</td>
                                                <td>{{ $task->assignedToUser->name ?? 'N/A' }}</td>
                                                <td>{{ ucfirst($task->status) ?? 'N/A' }}</td>
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
