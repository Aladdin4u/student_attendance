<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // show create form
    public function create() {
        $students = Student::join("courses","students.id", "=", "courses.id")->get();
        dd($students);
        return view("attendances.create", [
            "attendances" => $students
        ]);
    }
}
