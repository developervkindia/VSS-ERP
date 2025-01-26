<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type',
        'start_date',
        'end_date',
        'status',
        'approved_by',
        'notes',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public function setStartDateAttribute($value)
    {
       $this->attributes['start_date'] = $value ? Carbon::parse($value) : null;
    }

     public function setEndDateAttribute($value)
    {
       $this->attributes['end_date'] = $value ? Carbon::parse($value) : null;
    }

    public function getStartDateAttribute($value)
    {
         return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

    public function getEndDateAttribute($value)
    {
         return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

      public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }

     public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }


     public static function leaveStatuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }
}
