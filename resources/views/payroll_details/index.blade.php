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
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>No.</th>
                                         <th>Payslip No</th>
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
                                            <td>{{ $payrollDetail->payslip_number ?? '' }}</td>
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
                                                     <a href="{{ route('payroll_details.exportToPdf', $payrollDetail->id) }}" class="btn btn-sm bg-success" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Export PDF">
                                                            <i class="fas fa-file-pdf"></i>
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
