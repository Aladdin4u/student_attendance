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
        ]);

        Course::create($formFields);

        return back()->with("message", "Course created successfully!");
    }

    // update form data
    public function update(Request $request, Course $course) {
        // dd($request);
        $formFields = $request->validate([
            "code" => "required",
            "title" => "required",
            "semester" => "required",
            "session" => "required",
        ]);

        $course->update($formFields);

        return back()->with("message", "Course Updated Successfully!");
    }

    // destroy course data 
    public function destroy(Course $course) {
        // if(auth()->role != "admin"){
        //     abort(403, "Unauthorized Action");
        // }

        $course->delete();

        return back()->with("message", "course Deleted Successfully!");
    }
}
