<?php

namespace App\Exports;

use App\Models\PayrollDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class PayrollExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    public function collection()
    {
        return PayrollDetail::with('user')->get()->map(function ($payrollDetail) {
                return [
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
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
         $sheet->getStyle('1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setRGB('d3d3d3');

           $lastColumn = $sheet->getHighestColumn();
           $cellRange = 'A1:' . $lastColumn . '1';
          $sheet->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $cellRange = 'A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow();
         $sheet->getStyle($cellRange)->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
             ],
         ],
        ]);
    }

      public function columnWidths(): array
    {
        return [
            'A' => 25, // Employee Name
           'B' => 15, // Pay Date
           'C' => 15, // Pay Period
          'D' => 15, // Basic Salary
            'E' => 15, // Gross Salary
           'F' => 15, // Total Allowances
            'G' => 30, // Allowance Breakdown
            'H' => 15,  //Total Deductions
            'I' => 30, //Deduction Breakdown
           'J' => 15, //Total Tax
           'K' => 30, //Tax Breakdown
           'L' => 15, // Total Benefits
            'M' => 30, // Benefit Breakdown
           'N' => 15, // Net Salary
          'O' => 20,  // Payment Method
           'P' => 20, //Bank Name
           'Q' => 25, // Bank Account Number
            'R' => 15, // Bank Sort Code
           'S' => 10, // currency
        ];
    }
}
