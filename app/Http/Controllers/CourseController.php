<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // show create form
    public function create() {
        return view("students.create");
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
