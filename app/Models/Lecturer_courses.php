<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer_courses extends Model
{
    use HasFactory;

    //Relationship to student
    public function student()
    {
        return $this->hasMany(Student_courses::class, "course_id", "course_id");
    }
}
