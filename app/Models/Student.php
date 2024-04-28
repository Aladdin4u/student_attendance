<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //Relationship to course
    public function student_courses()
    {
        return $this->hasMany(Student_courses::class, "student_id");
    }
}
