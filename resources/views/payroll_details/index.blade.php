@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Payroll Details' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payroll Details</li>
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
                                    <h3 class="page-title">Payroll Details</h3>
                                </div>
                                 <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('payroll_details.create') }}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                    <a href="{{ route('payroll_details.exportToExcel') }}" class="btn btn-success"><i
                                                class="fas fa-file-excel"></i> Export to Excel</a>
                                </div>
                            </div>
                             <div class="row mt-2">
                                   <div class="col-md-4">
                                       <form action="" method="GET">
                                              <div class="form-group">
                                                    <select class="form-control select" name="users[]" multiple>
                                                         <option value="">Select Employee</option>
                                                       @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ in_array($user->id, request()->input('users', [])) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                         @endforeach
                                                    </select>
                                              </div>
                                         </div>
                                         <div class="col-md-2">
                                          <div class="form-group">
                                                 <select name="month" id="month" class="form-control select">
                                                    <option value="">Select Month</option>
                                                     @for($i = 1; $i <= 12; $i++)
                                                       <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                                    @endfor
                                                 </select>
                                            </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                               <select name="year" id="year" class="form-control select">
                                                    <option value="">Select Year</option>
                                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                                        <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                              </div>
                                      </div>
                                      <div class="col-md-2">
                                       <button class="btn btn-primary" type="submit">Search</button>
                                      </div>
                               </form>
                             </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>No.</th>
                                        <th>Employee</th>
                                        <th>Net Salary</th>
                                         <th>Pay Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrollDetails as $key => $payrollDetail)
                                        <tr>
                                            <td>{{ $payrollDetails->firstItem() + $key }}</td>
                                            <td><a href="{{ route('payroll_details.show', $payrollDetail->id) }}">{{ $payrollDetail->user->name ?? '' }}</a></td>
                                            <td>{{ $payrollDetail->net_salary ?? '' }}</td>
                                             <td>{{ $payrollDetail->pay_date ?? '' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                     <a href="{{ route('payroll_details.show', $payrollDetail->id) }}" class="btn btn-sm bg-info-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('payroll_details.edit', $payrollDetail->id) }}"
                                                        class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0)"
                                                        data-href="{{ route('payroll_details.destroy', $payrollDetail->id) }}"
                                                        class="btn btn-sm bg-danger confirm-delete" data-name="Payroll Detail"
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
                            {{ $payrollDetails->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
