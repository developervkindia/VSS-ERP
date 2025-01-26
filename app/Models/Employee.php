<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hire_date',
        'job_title',
        'department_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
     {
       return $this->belongsTo(Department::class);
    }

    public function performanceEvaluations()
    {
        return $this->hasMany(PerformanceEvaluation::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function payrollDetails()
    {
        return $this->hasMany(PayrollDetails::class);
    }


}
