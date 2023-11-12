<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_courses extends Model
{
    use HasFactory;

    //Relationship to student
    public function student()
    {
        return $this->belongsTo(Student::class, "student_id");
    }
    //Relationship to course
    public function courses()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
