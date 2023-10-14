<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('code', 'like', '%' . request('search') . '%')
            ->orWhere('title', 'like', '%' . request('search') . '%')
            ->orWhere('semester', 'like', '%' . request('search') . '%')
            ->orWhere('session', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to Student
    public function students(){
        return $this->belongsTo(Student::class, "studentId");
    }
}
