<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'class_numeric',
        'teacher_id',
        'class_description',
    ];
    
    public function subjects()
{
    return $this->belongsToMany(Subjects::class, 'class_subject', 'class_id', 'subject_id');
    
}

public function students()
    {
        return $this->hasMany(Students::class, 'class_numeric', 'class_numeric');
    }


}
