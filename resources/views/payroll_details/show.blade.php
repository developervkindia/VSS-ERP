@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? 'Payroll Detail' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('payroll_details.index') }}">Payroll Details</a></li>
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
                                        <th>Payslip No</th>
                                       <td>{{ $payrollDetail->payslip_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Employee</th>
                                        <td>{{ $payrollDetail->user->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                         <th>Pay Date</th>
                                         <td>{{ $payrollDetail->pay_date ?? '' }}</td>
                                    </tr>
                                      <tr>
                                        <th>Pay Period</th>
                                        <td>{{ $payrollDetail->pay_period ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Basic Salary</th>
                                        <td>{{ $payrollDetail->basic_salary ?? '' }}</td>
                                    </tr>
                                      <tr>
                                        <th>Gross Salary</th>
                                        <td>{{ $payrollDetail->gross_salary ?? '' }}</td>
                                    </tr>
                                     <tr>
                                         <th>Total Allowances</th>
                                         <td>{{ $payrollDetail->total_allowances ?? '' }}</td>
                                     </tr>
                                     <tr>
                                         <th>Allowance Breakdown</th>
                                         <td><pre>{{ json_encode(json_decode($payrollDetail->allowance_breakdown), JSON_PRETTY_PRINT) }}</pre></td>
                                     </tr>
                                     <tr>
                                         <th>Total Deductions</th>
                                         <td>{{ $payrollDetail->total_deductions ?? '' }}</td>
                                     </tr>
                                    <tr>
                                        <th>Deduction Breakdown</th>
                                        <td><pre>{{ json_encode(json_decode($payrollDetail->deduction_breakdown), JSON_PRETTY_PRINT) }}</pre></td>
                                    </tr>

                                    <tr>
                                         <th>Total Tax</th>
                                         <td>{{ $payrollDetail->total_tax ?? '' }}</td>
                                     </tr>
                                     <tr>
                                         <th>Tax Breakdown</th>
                                          <td><pre>{{ json_encode(json_decode($payrollDetail->tax_breakdown), JSON_PRETTY_PRINT) }}</pre></td>
                                      </tr>
                                       <tr>
                                         <th>Total Benefits</th>
                                         <td>{{ $payrollDetail->total_benefits ?? '' }}</td>
                                     </tr>
                                     <tr>
                                         <th>Benefit Breakdown</th>
                                          <td><pre>{{ json_encode(json_decode($payrollDetail->benefit_breakdown), JSON_PRETTY_PRINT) }}</pre></td>
                                     </tr>
                                    <tr>
                                        <th>Net Salary</th>
                                        <td>{{ $payrollDetail->net_salary ?? '' }}</td>
                                    </tr>
                                      <tr>
                                         <th>Payment Method</th>
                                        <td>{{ $payrollDetail->payment_method ?? '' }}</td>
                                    </tr>
                                     <tr>
                                         <th>Bank Name</th>
                                         <td>{{ $payrollDetail->bank_name ?? '' }}</td>
                                     </tr>
                                     <tr>
                                         <th>Bank Account Number</th>
                                         <td>{{ $payrollDetail->bank_account_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                         <th>Bank Sort Code</th>
                                         <td>{{ $payrollDetail->bank_sort_code ?? '' }}</td>
                                     </tr>
                                     <tr>
                                        <th>Currency</th>
                                        <td>{{ $payrollDetail->currency ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <div class="mt-4">
                             <a href="{{ route('payroll_details.edit', $payrollDetail->id) }}"
                               class="btn btn-sm bg-light" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="Edit">
                             <i class="fas fa-edit"></i> Edit
                               </a>
                             <a href="{{ route('payroll_details.exportToPdf', $payrollDetail->id) }}" class="btn btn-sm bg-success" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Export PDF">
                                    <i class="fas fa-file-pdf"></i> Export to PDF
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
