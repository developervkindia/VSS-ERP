<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'address',
        'resume_path',
        'cover_letter',
        'experience',
        'skills',
        'linkedin_profile',
        'portfolio_website',
        'status',
        'rating',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function notes()
    {
        return $this->hasMany(CandidateNote::class);
    }
}
