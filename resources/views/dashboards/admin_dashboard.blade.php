@extends('layouts.main')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                            <li class="breadcrumb-item active">Admin</li>
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
                                <h6>Users</h6>
                                <h3 class="text-3xl font-bold mt-2">{{ $totalUsers }}</h3>
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
                                <h6>Employees</h6>
                                <h3 class="text-3xl font-bold mt-2">{{ $totalEmployees }}</h3>
                            </div>
                            <div class="db-icon">
                               <i class="fas fa-user-tie text-white text-4xl"></i>
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
                                <h6>Projects</h6>
                                 <h3 class="text-3xl font-bold mt-2">{{ $totalProjects }}</h3>
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
                                <h6>Tasks</h6>
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
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Overview</h5>
                            </div>
                             <div class="col-6">
                                <ul class="chart-list-out">
                                   <li><span class="circle-blue"></span>Users</li>
                                    <li><span class="circle-green"></span>Employees</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <div id="apexcharts-area"></div>
                         </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                           <div class="col-6">
                                <h5 class="card-title">Number of Employees</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                     <li><span class="circle-blue"></span>Active</li>
                                    <li><span class="circle-green"></span>Inactive</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                         </div>
                    </div>
                    <div class="card-body">
                        <div id="bar"></div>
                    </div>
                </div>

            </div>
        </div>
         <div class="row">
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill student-space comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Recent Activities</h5>
                         <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                         </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table star-student table-hover table-center table-borderless table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Activity</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recentActivities as $activity)
                                      <tr>
                                           <td class="text-nowrap">{{ $activity->log_name ?? 'No activity found' }}</td>
                                           <td class="text-nowrap">{{ $activity->created_at }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>

            </div>
             <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">System Status</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                   </div>
                   <div class="card-body">
                        <div class="activity-groups">
                             <div class="activity-awards">
                                 <div class="award-boxs">
                                    <i class="fas fa-database text-green-500 text-4xl"></i>
                                </div>
                                 <div class="award-list-outs">
                                    <h4>Database Status</h4>
                                    <h5>Database is up and running</h5>
                                </div>
                               <div class="award-time-list">
                                       <span>Healthy</span>
                                   </div>
                             </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <i class="fas fa-server text-green-500 text-4xl"></i>
                                </div>
                                <div class="award-list-outs">
                                   <h4>Server Status</h4>
                                     <h5>Server is running smoothly</h5>
                                 </div>
                               <div class="award-time-list">
                                      <span>Healthy</span>
                                </div>
                            </div>
                             <div class="activity-awards">
                                <div class="award-boxs">
                                    <i class="fas fa-check-circle text-green-500 text-4xl"></i>
                                </div>
                               <div class="award-list-outs">
                                     <h4>Backups</h4>
                                      <h5>Backups are running perfectly</h5>
                                  </div>
                                  <div class="award-time-list">
                                       <span>Healthy</span>
                                   </div>
                             </div>
                              <div class="activity-awards">
                                  <div class="award-boxs">
                                       <i class="fas fa-exclamation-triangle text-yellow-500 text-4xl"></i>
                                    </div>
                                    <div class="award-list-outs">
                                         <h4>Unresolved Issue</h4>
                                        <h5>You have 2 unresolved issues</h5>
                                    </div>
                                     <div class="award-time-list">
                                          <span>Warning</span>
                                      </div>
                              </div>
                         </div>
                    </div>
                 </div>

            </div>
         </div>

        <div class="row">
             <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill fb sm-box">
                    <div class="social-likes">
                        <p>Like us on facebook</p>
                        <h6>50,095</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill twitter sm-box">
                    <div class="social-likes">
                        <p>Follow us on twitter</p>
                        <h6>48,596</h6>
                    </div>
                   <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
               <div class="card flex-fill insta sm-box">
                    <div class="social-likes">
                       <p>Follow us on instagram</p>
                        <h6>52,085</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill linkedin sm-box">
                    <div class="social-likes">
                        <p>Follow us on linkedin</p>
                        <h6>69,050</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
