<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //Relationship to course ID
    public function course(){
        return $this->hasMany(Course::class, "studentId");
    }
}
