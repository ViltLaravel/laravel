<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerComment extends Model
{
    use HasFactory;
    protected $table = 'freelancer_comment';
    protected $fillable = [
        'user_id',
        'employer_id',
        'employer_feedback',
        'employer_rating',
        'status',
        'job_title_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
