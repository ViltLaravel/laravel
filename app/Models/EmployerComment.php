<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerComment extends Model
{
    use HasFactory;
    protected $table = 'employer_comment';
    protected $fillable = [
        'user_id',
        'freelancer_id',
        'freelancer_feedback',
        'freelancer_rating'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
