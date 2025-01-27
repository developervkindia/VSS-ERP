@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? (isset($payrollDetail) ? 'Edit Payroll Detail' : 'Create Payroll Detail') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('payroll_details.index') }}">Payroll Details</a></li>
                        <li class="breadcrumb-item active">{{ isset($payrollDetail) ? 'Edit' : 'Create' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($payrollDetail) ? route('payroll_details.update', $payrollDetail->id) : route('payroll_details.store') }}"
                            method="POST">
                            @csrf
                            @isset($payrollDetail)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Payroll Detail Information</span></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Employee <span class="text-danger">*</span></label>
                                        <select class="form-control select @error('user_id') is-invalid @enderror" name="user_id" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id', isset($payrollDetail) ? $payrollDetail->user_id : '') == $user->id ? 'selected' : '' }}>
                                                    {{ ucwords($user->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Pay Date <span class="text-danger">*</span></label>
                                        <input type="date" name="pay_date"
                                            class="form-control @error('pay_date') is-invalid @enderror"
                                            value="{{ old('pay_date', isset($payrollDetail) && $payrollDetail->pay_date ? \Carbon\Carbon::parse($payrollDetail->pay_date)->format('Y-m-d') : '') }}" required>
                                        @error('pay_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Pay Period</label>
                                            <input type="text" name="pay_period"
                                                class="form-control @error('pay_period') is-invalid @enderror"
                                                placeholder="Enter pay period" value="{{ old('pay_period', $payrollDetail->pay_period ?? '') }}" >
                                            @error('pay_period')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Basic Salary <span class="text-danger">*</span></label>
                                            <input type="number" name="basic_salary"
                                                class="form-control @error('basic_salary') is-invalid @enderror"
                                                placeholder="Enter basic salary" value="{{ old('basic_salary', $payrollDetail->basic_salary ?? '') }}" required>
                                            @error('basic_salary')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Gross Salary <span class="text-danger">*</span></label>
                                            <input type="number" name="gross_salary"
                                                class="form-control @error('gross_salary') is-invalid @enderror"
                                                placeholder="Enter gross salary" value="{{ old('gross_salary', $payrollDetail->gross_salary ?? '') }}" required>
                                            @error('gross_salary')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Total Allowances</label>
                                            <input type="number" name="total_allowances"
                                                class="form-control @error('total_allowances') is-invalid @enderror"
                                                placeholder="Enter total allowances" value="{{ old('total_allowances', $payrollDetail->total_allowances ?? '') }}" >
                                            @error('total_allowances')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                   </div>
                                     <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Allowance Breakdown</label>
                                             <div id="allowance-breakdown-container" class="breakdown-container">
                                                 @if(isset($payrollDetail) && $payrollDetail->allowance_breakdown)
                                                      @foreach(json_decode($payrollDetail->allowance_breakdown, true) as $key => $value)
                                                             <div class="input-group mb-2">
                                                                 <input type="text" class="form-control"  placeholder="Name" value="{{ $key }}" name="allowance_key[]">
                                                                  <input type="number" class="form-control" placeholder="Value" value="{{ $value }}" name="allowance_value[]">
                                                                <button class="btn btn-danger remove-breakdown" type="button">
                                                                  <i class="fas fa-minus"></i>
                                                                 </button>
                                                              </div>
                                                        @endforeach
                                                @endif
                                               <div class="input-group mb-2">
                                                    <input type="text" class="form-control" placeholder="Name"  name="allowance_key[]">
                                                    <input type="number" class="form-control" placeholder="Value" name="allowance_value[]">
                                                    <button class="btn btn-success add-breakdown" data-container="allowance-breakdown-container" data-type="allowance" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                               </div>
                                          </div>
                                             @error('allowance_breakdown')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                             @enderror
                                        </div>
                                   </div>
                                     <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Total Deductions</label>
                                            <input type="number" name="total_deductions"
                                                class="form-control @error('total_deductions') is-invalid @enderror"
                                                placeholder="Enter total deductions" value="{{ old('total_deductions', $payrollDetail->total_deductions ?? '') }}"  >
                                            @error('total_deductions')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group local-forms">
                                           <label>Deduction Breakdown</label>
                                             <div id="deduction-breakdown-container" class="breakdown-container">
                                                 @if(isset($payrollDetail) && $payrollDetail->deduction_breakdown)
                                                     @foreach(json_decode($payrollDetail->deduction_breakdown, true) as $key => $value)
                                                            <div class="input-group mb-2">
                                                                <input type="text" class="form-control" placeholder="Name" value="{{ $key }}" name="deduction_key[]">
                                                                <input type="number" class="form-control" placeholder="Value" value="{{ $value }}" name="deduction_value[]">
                                                                <button class="btn btn-danger remove-breakdown" type="button">
                                                                     <i class="fas fa-minus"></i>
                                                                 </button>
                                                             </div>
                                                      @endforeach
                                                   @endif
                                               <div class="input-group mb-2">
                                                      <input type="text" class="form-control" placeholder="Name" name="deduction_key[]">
                                                     <input type="number" class="form-control" placeholder="Value" name="deduction_value[]">
                                                     <button class="btn btn-success add-breakdown" data-container="deduction-breakdown-container" data-type="deduction" type="button">
                                                         <i class="fas fa-plus"></i>
                                                      </button>
                                                  </div>
                                          </div>
                                            @error('deduction_breakdown')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                           @enderror
                                      </div>
                                   </div>
                                     <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Total Tax</label>
                                            <input type="number" name="total_tax"
                                                class="form-control @error('total_tax') is-invalid @enderror"
                                                placeholder="Enter total tax" value="{{ old('total_tax', $payrollDetail->total_tax ?? '') }}">
                                            @error('total_tax')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Tax Breakdown</label>
                                        <div id="tax-breakdown-container" class="breakdown-container">
                                            @if(isset($payrollDetail) && $payrollDetail->tax_breakdown)
                                                @foreach(json_decode($payrollDetail->tax_breakdown, true) as $key => $value)
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" placeholder="Name" value="{{ $key }}" name="tax_key[]">
                                                       <input type="number" class="form-control" placeholder="Value" value="{{ $value }}" name="tax_value[]">
                                                       <button class="btn btn-danger remove-breakdown" type="button">
                                                         <i class="fas fa-minus"></i>
                                                          </button>
                                                      </div>
                                                @endforeach
                                            @endif
                                            <div class="input-group mb-2">
                                                 <input type="text" class="form-control" placeholder="Name" name="tax_key[]">
                                                <input type="number" class="form-control" placeholder="Value" name="tax_value[]">
                                               <button class="btn btn-success add-breakdown" data-container="tax-breakdown-container" data-type="tax" type="button">
                                                     <i class="fas fa-plus"></i>
                                                </button>
                                           </div>
                                        </div>
                                         @error('tax_breakdown')
                                              <span class="text-danger text-sm">{{ $message }}</span>
                                           @enderror
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Total Benefits</label>
                                            <input type="number" name="total_benefits"
                                                class="form-control @error('total_benefits') is-invalid @enderror"
                                                placeholder="Enter total benefits" value="{{ old('total_benefits', $payrollDetail->total_benefits ?? '') }}" >
                                            @error('total_benefits')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Benefit Breakdown</label>
                                             <div id="benefit-breakdown-container" class="breakdown-container">
                                                    @if(isset($payrollDetail) && $payrollDetail->benefit_breakdown)
                                                          @foreach(json_decode($payrollDetail->benefit_breakdown, true) as $key => $value)
                                                              <div class="input-group mb-2">
                                                                   <input type="text" class="form-control" placeholder="Name" value="{{ $key }}" name="benefit_key[]">
                                                                    <input type="number" class="form-control" placeholder="Value" value="{{ $value }}" name="benefit_value[]">
                                                                   <button class="btn btn-danger remove-breakdown" type="button">
                                                                       <i class="fas fa-minus"></i>
                                                                   </button>
                                                               </div>
                                                          @endforeach
                                                    @endif
                                               <div class="input-group mb-2">
                                                 <input type="text" class="form-control" placeholder="Name" name="benefit_key[]">
                                                   <input type="number" class="form-control" placeholder="Value" name="benefit_value[]">
                                                 <button class="btn btn-success add-breakdown" data-container="benefit-breakdown-container" data-type="benefit" type="button">
                                                      <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                          </div>
                                           @error('benefit_breakdown')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                      </div>
                                   </div>
                                <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Net Salary <span class="text-danger">*</span></label>
                                            <input type="number" name="net_salary"
                                                class="form-control @error('net_salary') is-invalid @enderror"
                                                placeholder="Enter net salary" value="{{ old('net_salary', $payrollDetail->net_salary ?? '') }}" required readonly>
                                            @error('net_salary')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Payment Method</label>
                                            <input type="text" name="payment_method"
                                                class="form-control @error('payment_method') is-invalid @enderror"
                                                placeholder="Enter payment method" value="{{ old('payment_method', $payrollDetail->payment_method ?? '') }}" >
                                             @error('payment_method')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank_name"
                                                class="form-control @error('bank_name') is-invalid @enderror"
                                                placeholder="Enter bank name" value="{{ old('bank_name', $payrollDetail->bank_name ?? '') }}" >
                                            @error('bank_name')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Bank Account Number</label>
                                            <input type="text" name="bank_account_number"
                                                class="form-control @error('bank_account_number') is-invalid @enderror"
                                                placeholder="Enter bank account number" value="{{ old('bank_account_number', $payrollDetail->bank_account_number ?? '') }}" >
                                            @error('bank_account_number')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Bank Sort Code</label>
                                            <input type="text" name="bank_sort_code"
                                                class="form-control @error('bank_sort_code') is-invalid @enderror"
                                                placeholder="Enter bank sort code" value="{{ old('bank_sort_code', $payrollDetail->bank_sort_code ?? '') }}" >
                                             @error('bank_sort_code')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                                       <div class="col-md-6">
                                          <div class="form-group local-forms">
                                            <label>Currency</label>
                                            <input type="text" name="currency"
                                                class="form-control @error('currency') is-invalid @enderror"
                                                placeholder="Enter currency" value="{{ old('currency', $payrollDetail->currency ?? 'USD') }}">
                                            @error('currency')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                   </div>
                                   <div class="col-12">
                                       <button type="submit"
                                           class="btn btn-primary">{{ isset($payrollDetail) ? 'Save' : 'Submit' }}</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
              function calculateNetSalary() {
                let basicSalary = parseFloat(document.querySelector('input[name="basic_salary"]').value) || 0;
                let grossSalary = parseFloat(document.querySelector('input[name="gross_salary"]').value) || 0;
                  let totalAllowances = parseFloat(document.querySelector('input[name="total_allowances"]').value) || 0;
                  let totalDeductions = parseFloat(document.querySelector('input[name="total_deductions"]').value) || 0;
                  let totalTax = parseFloat(document.querySelector('input[name="total_tax"]').value) || 0;
                   let totalBenefits = parseFloat(document.querySelector('input[name="total_benefits"]').value) || 0;
                  let netSalary = grossSalary + totalBenefits - totalDeductions - totalTax;
                   document.querySelector('input[name="net_salary"]').value = netSalary.toFixed(2);
               }
               const addBreakdownButtons = document.querySelectorAll('.add-breakdown');
                addBreakdownButtons.forEach(button => {
                    button.addEventListener('click', function() {
                       const containerId = this.getAttribute('data-container');
                       const type = this.getAttribute('data-type');
                        const container = document.getElementById(containerId);
                       const newRow =  document.createElement('div');
                          newRow.classList.add('input-group', 'mb-2');
                           newRow.innerHTML = `
                                <input type="text" class="form-control" placeholder="Name" name="${type}_key[]">
                                <input type="number" class="form-control" placeholder="Value" name="${type}_value[]">
                                <button class="btn btn-danger remove-breakdown" type="button">
                                   <i class="fas fa-minus"></i>
                                </button>
                         `;
                        container.insertBefore(newRow,container.lastElementChild);
                      });
                });
                document.addEventListener('click', function(e) {
                     if (e.target.classList.contains('remove-breakdown')) {
                        e.target.closest('.input-group').remove();
                      }
               });

               document.querySelectorAll('input[name="basic_salary"], input[name="gross_salary"], input[name="total_allowances"], input[name="total_deductions"], input[name="total_tax"], input[name="total_benefits"]').forEach(element => {
                  element.addEventListener('input', calculateNetSalary);
                 });
               calculateNetSalary();
       });
    </script>
@endsection
