<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllFreelancerlist extends Model
{
    use HasFactory;
    protected $table = 'all_freelancerlists';
    protected $fillable = [
        'category_id',
        'user_id',
    ];

    // public function users(){
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    

}
