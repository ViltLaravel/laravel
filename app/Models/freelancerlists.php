<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelancerlists extends Model
{
    use HasFactory;
    protected $table = 'freelancerlists';
    protected $fillable = [
        'user_id',
        'job_title_id'
    ];


    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobtitle(){
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }
}
