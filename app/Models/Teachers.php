<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'name',
        'email',
        'gender',
        'phone',
        'dateofbirth',
        'current_address',
        'permanent_address',
    ];
    public function subjects()
{
    return $this->hasMany(\App\Models\Subjects::class, 'teacher_id', 'teacher_id');
}


}