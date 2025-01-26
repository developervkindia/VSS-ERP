<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
        protected $fillable = [
            'street_address',
            'city',
            'state',
            'postal_code',
            'country',
           'user_id',
        ];

        public function employee(): BelongsTo
         {
             return $this->belongsTo(Employee::class);
         }
}
