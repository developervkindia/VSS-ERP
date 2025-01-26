<?php

namespace App\Exports;

use App\Models\PayrollDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayrollExport implements FromCollection, WithHeadings
{
     public function collection()
    {
        return PayrollDetail::with('user')->get()->map(function ($payrollDetail) {
                return [
                  'Payslip Number' => $payrollDetail->payslip_number,
                    'Employee Name' => $payrollDetail->user->name,
                    'Pay Date' => $payrollDetail->pay_date,
                   'Pay Period' => $payrollDetail->pay_period,
                    'Basic Salary' => $payrollDetail->basic_salary,
                    'Gross Salary' => $payrollDetail->gross_salary,
                   'Total Allowances' => $payrollDetail->total_allowances,
                    'Allowance Breakdown' => $payrollDetail->allowance_breakdown,
                    'Total Deductions' => $payrollDetail->total_deductions,
                    'Deduction Breakdown' => $payrollDetail->deduction_breakdown,
                    'Total Tax' => $payrollDetail->total_tax,
                    'Tax Breakdown' => $payrollDetail->tax_breakdown,
                   'Total Benefits' => $payrollDetail->total_benefits,
                    'Benefit Breakdown' => $payrollDetail->benefit_breakdown,
                   'Net Salary' => $payrollDetail->net_salary,
                    'Payment Method' => $payrollDetail->payment_method,
                     'Bank Name' => $payrollDetail->bank_name,
                    'Bank Account Number' => $payrollDetail->bank_account_number,
                   'Bank Sort Code' => $payrollDetail->bank_sort_code,
                   'Currency' => $payrollDetail->currency,
                ];
            });
    }

    public function headings(): array
    {
        return [
              'Payslip Number',
              'Employee Name',
            'Pay Date',
           'Pay Period',
             'Basic Salary',
            'Gross Salary',
            'Total Allowances',
            'Allowance Breakdown',
           'Total Deductions',
           'Deduction Breakdown',
            'Total Tax',
           'Tax Breakdown',
            'Total Benefits',
            'Benefit Breakdown',
            'Net Salary',
            'Payment Method',
            'Bank Name',
            'Bank Account Number',
           'Bank Sort Code',
             'Currency',

        ];
    }
}
