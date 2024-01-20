<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Student_courses;
use Illuminate\Http\Request;

class Student_coursesController extends Controller
{
    // store form data
    public function store(Request $request)
    {
        $findStudent = Student::where("user_id",$request->user_id)->get();
        
        if($findStudent->isEmpty()) {
            return back()->with("message", "Student registration is not completed!");
        }
        $item = Student_courses::latest()->where("course_id", "=", $request->course_id)
            ->where("user_id", "=", $request->user_id)
            ->get();

        if (!$item->isEmpty()) {
            return back()->with("message", "This course is already in the list");
        }
        $formFields = $request->validate([
            "user_id" => "required",
            "course_id" => "required"
        ]);

        Student_courses::create($formFields);


        return back()->with("message", "Course added successfully!");
    }

    // destroy student_courses data 
    public function destroy(Student_courses $student_courses)
    {
        $student_courses->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
