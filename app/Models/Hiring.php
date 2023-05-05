<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;

    protected $table = 'hiring';
    protected $fillable = [
        'user_id',
        'employee_id',
        'emp_attachment',
        'emp_message',
        'status',
        'start_contract',
        'end_contract'
    ];
}
