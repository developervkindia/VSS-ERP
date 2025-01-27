@extends('layouts.main')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                         <h3 class="page-title">Welcome HR!</h3>
                         <ul class="breadcrumb">
                             {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                             <li class="breadcrumb-item active">HR</li>
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
                                <h6>Total Employees</h6>
                                <h3 class="text-3xl font-bold mt-2">{{ $totalEmployees }}</h3>
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
                                 <h6>Active Employees</h6>
                                 <h3 class="text-3xl font-bold mt-2">{{ $activeEmployees }}</h3>
                            </div>
                             <div class="db-icon">
                                 <i class="fas fa-user-check text-white text-4xl"></i>
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
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Pending Performance Evaluations</h6>
                                 <h3 class="text-3xl font-bold mt-2">{{ $pendingPerformanceEvaluations }}</h3>
                            </div>
                           <div class="db-icon">
                              <i class="fas fa-tasks text-white text-4xl"></i>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-12 col-lg-12 col-xl-8">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                          <div class="card flex-fill comman-shadow">
                                 <div class="card-header">
                                     <div class="row align-items-center">
                                       <div class="col-6">
                                             <h5 class="card-title">Pending Leave Requests</h5>
                                          </div>
                                        </div>
                                 </div>
                                 <div class="card-body">
                                 <div class="table-responsive lesson">
                                   <table class="table table-center">
                                      <thead>
                                        <tr>
                                            <th>Employee</th>
                                             <th>Leave Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            @foreach($leaveRequests as $leaveRequest)
                                                 <tr>
                                                    <td>{{ $leaveRequest->user->name ?? 'N/A' }}</td>
                                                     <td>{{ $leaveRequest->leave_type ?? 'N/A' }}</td>
                                                     <td>{{ $leaveRequest->start_date ?? 'N/A' }}</td>
                                                     <td>{{ $leaveRequest->end_date ?? 'N/A' }}</td>
                                                 </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                           </div>
                      </div>
                    </div>
                {{-- <div class="col-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h5 class="card-title">New Hires This Month</h5>
                                </div>
                            </div>
                        </div>
                         <div class="dash-widget">
                             <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="50">
                                    <div class="progress-less">
                                      <h3 class="text-3xl font-bold mt-2">{{ $newHires }}</h3>
                                        <p>New Hires</p>
                                    </div>
                                  </div>
                             </div>
                         </div>
                      </div>
                </div> --}}
           </div>
    </div>
@endsection
