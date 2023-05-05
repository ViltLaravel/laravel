<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FreelancerSkill extends Model
{
    use HasFactory;
    protected $table = 'freelancer_skills';
    protected $fillable = [
        'skill_id',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
}