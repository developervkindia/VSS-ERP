<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_positions';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'department_id',
         'employment_type',
        'experience_required',
        'salary_min',
        'salary_max',
         'location_type',
       'address',
        'country',
          'state',
          'city',
            'postal_code',
       'opening_date',
         'closing_date',
        'publish_date',
        'is_active',
        'meta'
        //add other entries that your table needs in case required for updates
    ];


      public function department()
     {
       return $this->belongsTo(Department::class);
     }
     public function candidates()
     {
       return $this->hasMany(Candidate::class); // Make sure you have this relationship defined in Job Model
     }
}
