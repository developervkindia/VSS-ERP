<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class PayrollDetail extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'pay_date',
        'pay_period',
         'basic_salary',
        'gross_salary',
         'total_allowances',
         'allowance_breakdown',
        'total_deductions',
        'deduction_breakdown',
         'total_tax',
         'tax_breakdown',
        'total_benefits',
        'benefit_breakdown',
        'net_salary',
        'payment_method',
        'bank_name',
        'bank_account_number',
        'bank_sort_code',
        'currency',
         'payslip_number',
    ];


   public function setPayDateAttribute($value)
   {
        $this->attributes['pay_date'] = $value ? Carbon::parse($value) : null;
    }

    public function getPayDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }


     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
