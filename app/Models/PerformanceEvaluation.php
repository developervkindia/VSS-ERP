<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class PerformanceEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'evaluation_cycle',
        'evaluation_date',
        'overall_rating',
        'notes',
    ];

    public function setEvaluationDateAttribute($value)
    {
       $this->attributes['evaluation_date'] = $value ? Carbon::parse($value) : null;
    }

    public function getEvaluationDateAttribute($value)
    {
         return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

     public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

}
