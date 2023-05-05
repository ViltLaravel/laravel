<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\freelancerlists;

class JobTitle extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'categoryname',
        'status'
    ];
   
    public function freelancerlists(){
      return $this->hasMany(freelancerlists::class);
    }

    

}
