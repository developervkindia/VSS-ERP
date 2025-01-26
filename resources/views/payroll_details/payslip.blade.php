<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <style>
        body { font-family: sans-serif; }
        .payslip { width: 80%; margin: 20px auto; border: 1px solid #ccc; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .info { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .breakdown { border-top: 1px solid #ccc; padding-top: 10px; margin-top: 10px; }
        .breakdown h4 { margin-bottom: 5px; }
        .breakdown ul { list-style: none; padding: 0; margin: 0; }
        .breakdown li { display: flex; justify-content: space-between; padding: 5px 0; }
         .text-right{text-align: right;}
    </style>
</head>
<body>
    <div class="payslip">
        <div class="header">
            <h2>Payslip</h2>
            <p>Payslip Number: {{ $payrollDetail->payslip_number }}</p>
        </div>

        <div class="info">
            <div>
                <p><strong>Employee:</strong> {{ $payrollDetail->user->name ?? '' }}</p>
                <p><strong>Pay Period:</strong> {{ $payrollDetail->pay_period ?? '' }}</p>
            </div>
            <div class="text-right">
                 <p><strong>Pay Date:</strong> {{ $payrollDetail->pay_date ?? '' }}</p>
            </div>
        </div>
        <div class="info">
            <div>
                 <p><strong>Payment Method:</strong> {{ $payrollDetail->payment_method ?? '' }}</p>
                 @if($payrollDetail->bank_name)
                   <p><strong>Bank Name:</strong> {{ $payrollDetail->bank_name }}</p>
                   <p><strong>Account Number:</strong> {{ $payrollDetail->bank_account_number }}</p>
                    <p><strong>Sort Code:</strong> {{ $payrollDetail->bank_sort_code }}</p>
                  @endif
            </div>
        </div>
        <div class="breakdown">
            <h4>Earnings</h4>
            <ul>
                 <li><span>Basic Salary:</span><span>{{ $payrollDetail->basic_salary }} {{ $payrollDetail->currency }}</span></li>
                <li><span>Gross Salary:</span><span>{{ $payrollDetail->gross_salary }} {{ $payrollDetail->currency }}</span></li>
                @if($payrollDetail->total_allowances > 0)
                     <li><span>Total Allowances:</span><span>{{ $payrollDetail->total_allowances }} {{ $payrollDetail->currency }}</span></li>
                  @endif
                @if($payrollDetail->allowance_breakdown)
                    @foreach(json_decode($payrollDetail->allowance_breakdown, true) as $key => $value)
                        <li><span>{{ ucfirst($key) }}:</span><span>{{ $value }} {{ $payrollDetail->currency }}</span></li>
                    @endforeach
                @endif

            </ul>
        </div>
        <div class="breakdown">
            <h4>Deductions</h4>
             @if($payrollDetail->total_deductions > 0)
                 <ul>
                    <li><span>Total Deductions:</span><span>{{ $payrollDetail->total_deductions }} {{ $payrollDetail->currency }}</span></li>
                 </ul>
             @endif
            @if($payrollDetail->deduction_breakdown)
                <ul>
                    @foreach(json_decode($payrollDetail->deduction_breakdown, true) as $key => $value)
                        <li><span>{{ ucfirst($key) }}:</span><span>{{ $value }} {{ $payrollDetail->currency }}</span></li>
                    @endforeach
                </ul>
             @endif
        </div>
        <div class="breakdown">
            <h4>Taxes</h4>
             @if($payrollDetail->total_tax > 0)
                <ul>
                     <li><span>Total Tax:</span><span>{{ $payrollDetail->total_tax }} {{ $payrollDetail->currency }}</span></li>
                 </ul>
            @endif
            @if($payrollDetail->tax_breakdown)
                <ul>
                    @foreach(json_decode($payrollDetail->tax_breakdown, true) as $key => $value)
                        <li><span>{{ ucfirst($key) }}:</span><span>{{ $value }} {{ $payrollDetail->currency }}</span></li>
                    @endforeach
                </ul>
            @endif
        </div>
         <div class="breakdown">
            <h4>Benefits</h4>
             @if($payrollDetail->total_benefits > 0)
                <ul>
                    <li><span>Total Benefits:</span><span>{{ $payrollDetail->total_benefits }} {{ $payrollDetail->currency }}</span></li>
                </ul>
            @endif
             @if($payrollDetail->benefit_breakdown)
                <ul>
                    @foreach(json_decode($payrollDetail->benefit_breakdown, true) as $key => $value)
                        <li><span>{{ ucfirst($key) }}:</span><span>{{ $value }} {{ $payrollDetail->currency }}</span></li>
                    @endforeach
                </ul>
           @endif
        </div>

        <div class="breakdown">
             <ul>
               <li><h4>Net Salary:</h4> <span>{{ $payrollDetail->net_salary }} {{ $payrollDetail->currency }}</span></li>
            </ul>
        </div>
    </div>
</body>
</html>
