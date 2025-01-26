@extends('layouts.main')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ $user->name }}!</h3>
                        <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                            <li class="breadcrumb-item active">Employee</li>
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
                              <h6>Email</h6>
                                <h3 class="text-3xl font-bold mt-2">{{ $user->email ?? '' }}</h3>
                           </div>
                           <div class="db-icon">
                                 <i class="fas fa-envelope text-white text-4xl"></i>
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
                                      <h6>Assigned Tasks</h6>
                                       <h3 class="text-3xl font-bold mt-2">{{ $totalTasks }}</h3>
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
                <div class="card flex-fill comman-shadow">
                   <div class="card-header">
                        <div class="row align-items-center">
                             <div class="col-6">
                                <h5 class="card-title">Recent Payslips</h5>
                              </div>
                         </div>
                    </div>
                   <div class="card-body">
                      <div class="table-responsive lesson">
                            <table class="table table-center">
                               <thead>
                                  <tr>
                                       <th>Payslip Number</th>
                                      <th>Pay Date</th>
                                      <th>Net Salary</th>
                                      <th>Action</th>
                                  </tr>
                                </thead>
                             <tbody>
                                 @foreach($payrollDetails as $payrollDetail)
                                        <tr>
                                            <td>{{ $payrollDetail->payslip_number ?? '' }}</td>
                                            <td>{{ $payrollDetail->pay_date ?? '' }}</td>
                                           <td>{{ $payrollDetail->net_salary ?? '' }}</td>
                                           <td>
                                           <a href="{{ route('payroll_details.exportToPdf', $payrollDetail->id) }}" class="btn btn-sm bg-success" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="Export PDF">
                                               <i class="fas fa-file-pdf"></i>
                                            </a>
                                           </td>
                                        </tr>
                                  @endforeach
                               </tbody>
                            </table>
                      </div>
                   </div>
               </div>
            </div>
             <div class="col-12 col-lg-12 col-xl-4 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-body">
                        <div id="calendar-doctor" class="calendar-container"></div>
                        <div class="calendar-info calendar-info1">
                           <div class="up-come-header">
                                <h2>Upcoming Events</h2>
                                  <span><a href="javascript:;"><i class="feather-plus"></i></a></span>
                            </div>
                            <div class="upcome-event-date">
                                <h3>Today</h3>
                                <span><i class="fas fa-ellipsis-h"></i></span>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
       </div>
    </div>
@endsection
