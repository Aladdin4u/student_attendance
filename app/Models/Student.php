<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('code', 'like', '%' . request('CRE 152') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('firstName', 'like', '%' . request('search') . '%')
                ->orWhere('lastName', 'like', '%' . request('search') . '%')
                ->orWhere('otherName', 'like', '%' . request('search') . '%')
                ->orWhere('regNumber', 'like', '%' . request('search') . '%')
                ->orWhere('level', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to course
    public function student_courses()
    {
        return $this->hasMany(Student_courses::class, "student_id");
    }
}
