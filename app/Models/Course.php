<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Relationship to Student
    public function students(){
        return $this->belongsTo(Student::class, "studentId");
    }
}
