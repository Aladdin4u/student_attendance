<?php

namespace App\Http\Controllers;

use App\Models\Student_courses;
use Illuminate\Http\Request;

class Student_coursesController extends Controller
{
    // store form data
    public function store(Request $request)
    {
        $item = Student_courses::latest()->where("course_id", "=", $request->course_id)
            ->where("student_id", "=", $request->student_id)
            ->get();
        // dd($item, Student_courses::all());

        if ($item) {
            return back()->with("message", "This course assigned is already in the list");
        }
        $formFields = $request->validate([
            "student_id" => "required",
            "course_id" => "required"
        ]);

        Student_courses::create($formFields);


        return back()->with("message", "Course assigned successfully!");
    }
}
