<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pay_date',
        'gross_salary',
        'net_salary',
        'deductions',
         'deduction_breakdown',
          'tax_amount',
           'tax_breakdown',
           'benefits_amount',
           'benefits_breakdown',
         'payment_method',
         'bank_name',
         'bank_account_number',
         'bank_sort_code',
         'currency',

    ];


    public function employee()
     {
        return $this->belongsTo(Employee::class);
    }
}
