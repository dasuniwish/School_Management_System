<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'student_name',
        'gender',
        'phone',
        'dateofbirth',
        'class_numeric',
        'current_address',
        'permanent_address',
        'mother_name',
        'mother_phone',
        'mother_address',
        'father_name',
        'father_phone',
        'father_address',
        'guardian_name',
        'guardian_phone',
        'guardian_address',
    ];
    
}
