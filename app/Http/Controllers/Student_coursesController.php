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
        // dd($item, $request, !$item->isEmpty());

        if (!$item->isEmpty()) {
            return back()->with("message", "This course is already in the list");
        }
        $formFields = $request->validate([
            "student_id" => "required",
            "course_id" => "required"
        ]);

        Student_courses::create($formFields);


        return back()->with("message", "Course added successfully!");
    }

    // destroy student_courses data 
    public function destroy(Student_courses $student_courses)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $student_courses->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
