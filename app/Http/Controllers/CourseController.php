<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // show student students
    public function show(Course $course) {
        return view("students.show", [
            "student" => $course
        ]);
    }
    // store form data
    public function store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            "code" => "required",
            "title" => "required",
            "semester" => "required",
            "session" => "required",
            "studentId" => "required",
        ]);

        Course::create($formFields);

        return back()->with("message", "Course created successfully!");
    }
}
