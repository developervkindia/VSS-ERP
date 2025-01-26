<?php

namespace App\Http\Controllers;

use App\Models\PayrollDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PayrollExport;
use Illuminate\Support\Str;

class PayrollDetailController extends Controller
{
     public function index()
    {
         $title = 'List Payroll Details';
         $payrollDetails = PayrollDetail::with('user')->paginate(10);
        return view('payroll_details.index', compact('payrollDetails','title'));
    }


    public function create()
    {
        $title = 'Create Payroll Detail';
        $users = User::all();
         return view('payroll_details.create', compact('title','users'));
    }

    public function store(Request $request)
    {
          $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pay_date' => 'required|date',
             'pay_period' => 'nullable|max:255',
             'basic_salary' => 'required|numeric',
            'gross_salary' => 'required|numeric',
            'total_allowances' => 'nullable|numeric',
            'allowance_breakdown' => 'nullable|json',
            'total_deductions' => 'nullable|numeric',
            'deduction_breakdown' => 'nullable|json',
             'total_tax' => 'nullable|numeric',
            'tax_breakdown' => 'nullable|json',
             'total_benefits' => 'nullable|numeric',
            'benefit_breakdown' => 'nullable|json',
            'net_salary' => 'required|numeric',
            'payment_method' => 'nullable|max:255',
            'bank_name' => 'nullable|max:255',
            'bank_account_number' => 'nullable|max:255',
             'bank_sort_code' => 'nullable|max:255',
              'currency' => 'nullable|max:255',

        ]);

         $validatedData['payslip_number'] = 'PS-' . Str::random(10);

          PayrollDetail::create($validatedData);

          return redirect()->route('payroll_details.index')->with('success', 'Payroll Detail created successfully.');
    }


    public function show(PayrollDetail $payrollDetail)
    {
        $title = 'Payroll Detail';
        $payrollDetail->load('user');
        return view('payroll_details.show', compact('payrollDetail','title'));
    }

    public function edit(PayrollDetail $payrollDetail)
    {
         $title = 'Edit Payroll Detail';
         $users = User::all();
        $payrollDetail->setAttribute('pay_date', $payrollDetail->getRawOriginal('pay_date'));
          return view('payroll_details.create', compact('payrollDetail','title','users'));
    }


    public function update(Request $request, PayrollDetail $payrollDetail)
    {
           $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'pay_date' => 'required|date',
                'pay_period' => 'nullable|max:255',
                 'basic_salary' => 'required|numeric',
                'gross_salary' => 'required|numeric',
                'total_allowances' => 'nullable|numeric',
                'allowance_breakdown' => 'nullable|json',
                'total_deductions' => 'nullable|numeric',
                'deduction_breakdown' => 'nullable|json',
                 'total_tax' => 'nullable|numeric',
                'tax_breakdown' => 'nullable|json',
                 'total_benefits' => 'nullable|numeric',
                'benefit_breakdown' => 'nullable|json',
                'net_salary' => 'required|numeric',
                'payment_method' => 'nullable|max:255',
                'bank_name' => 'nullable|max:255',
                'bank_account_number' => 'nullable|max:255',
                 'bank_sort_code' => 'nullable|max:255',
                  'currency' => 'nullable|max:255',

            ]);


          $payrollDetail->update($validatedData);

         return redirect()->route('payroll_details.index')->with('success', 'Payroll Detail updated successfully.');
    }


    public function destroy(PayrollDetail $payrollDetail)
    {
          $payrollDetail->delete();
          return redirect()->route('payroll_details.index')->with('success', 'Payroll Detail deleted successfully');
    }

    public function exportToExcel()
    {
         return Excel::download(new PayrollExport, 'payroll.xlsx');
    }

     public function exportToPdf(PayrollDetail $payrollDetail)
     {
        $payrollDetail->load('user');
        $pdf = Pdf::loadView('payroll_details.payslip', compact('payrollDetail'));
        return $pdf->download('payslip.pdf');

     }
}
