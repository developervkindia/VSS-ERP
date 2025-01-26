<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'start_date', 'end_date', 'description', 'type', 'status'];


    const TYPE_INTERNAL = 'internal';
    const TYPE_EXTERNAL = 'external';

    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_ON_HOLD = 'on_hold';
    const STATUS_CANCELLED = 'cancelled';


    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::parse($value) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::parse($value) : null;
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public static function projectTypes():array
    {
         return [
            self::TYPE_INTERNAL => 'Internal',
            self::TYPE_EXTERNAL => 'External',
         ];
    }

     public static function projectStatuses():array
     {
          return [
               self::STATUS_PENDING => 'Pending',
               self::STATUS_IN_PROGRESS => 'In Progress',
               self::STATUS_COMPLETED => 'Completed',
               self::STATUS_ON_HOLD => 'On Hold',
               self::STATUS_CANCELLED => 'Cancelled',
         ];
    }
}
