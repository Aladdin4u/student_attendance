<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // show all students
    public function index() {
        return view("students.index", [
            "students" => Student::all()
        ]);
    }

    // show student students
    public function show(Student $student) {
        return view("students.show", [
            "student" => $student
        ]);
    }
}
