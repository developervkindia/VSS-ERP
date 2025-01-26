@extends('layouts.main')

@section('content')
 <div class="content container-fluid">
     <div class="page-header">
         <div class="row align-items-center">
             <div class="col">
                 <h3 class="page-title">User Details</h3>
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
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
                                     <td>{{ $user->name }}</td>
                                 </tr>
                                 <tr>
                                    <th>Email</th>
                                     <td>{{ $user->email }}</td>
                                 </tr>
                                  <tr>
                                    <th>Role</th>
                                     <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                  </tr>
                                   <tr>
                                    <th>Phone</th>
                                      <td>{{ $user->phone ?? 'N/A' }}</td>
                                   </tr>
                                  <tr>
                                     <th>Hire Date</th>
                                       <td>{{ $user->employee->hire_date ?? 'N/A' }}</td>
                                 </tr>
                                  <tr>
                                       <th>Job Title</th>
                                        <td>{{ $user->employee->job_title ?? 'N/A' }}</td>
                                 </tr>
                                 <tr>
                                     <th>Department</th>
                                     <td>{{ $user->employee->department->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                  <th>Street Address</th>
                                    <td>{{ $user->addresses->first()->street_address ?? 'N/A' }}</td>
                                </tr>
                               <tr>
                                    <th>City</th>
                                     <td>{{  $user->addresses->first()->city ?? 'N/A' }}</td>
                                 </tr>
                                   <tr>
                                     <th>State</th>
                                      <td>{{  $user->addresses->first()->state ?? 'N/A' }}</td>
                                   </tr>
                                    <tr>
                                        <th>Postal Code</th>
                                         <td>{{ $user->addresses->first()->postal_code ?? 'N/A' }}</td>
                                    </tr>
                                     <tr>
                                       <th>Country</th>
                                        <td>{{  $user->addresses->first()->country ?? 'N/A' }}</td>
                                   </tr>
                             </tbody>
                         </table>
                        </div>
                   </div>
              </div>
         </div>
     </div>
</div>
@endsection
