<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'subject_code',
        'teacher_id',
        'description'
    ];

    public function classes()
{
    return $this->belongsToMany(Classes::class, 'class_subject', 'subject_id', 'class_id');
}


}
