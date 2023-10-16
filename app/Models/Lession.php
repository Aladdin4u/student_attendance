<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
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

    public function courses() {
        return $this->belongsTo(Course::class, "course_id");
    }
    public function students() {
        return $this->belongsTo(Student::class, "student_id");
    }
    public function attendances() {
        return $this->belongsTo(Attendance::class, "attendance_id");
    }
    public function lecturers() {
        return $this->belongsTo(User::class, "lecturer_id");
    }
}
