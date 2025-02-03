<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateNote extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'user_id', 'note'];

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
