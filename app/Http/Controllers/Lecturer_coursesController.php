<?php

namespace App\Http\Controllers;

use App\Models\Lecturer_courses;
use Illuminate\Http\Request;

class Lecturer_coursesController extends Controller
{
    // store form data
    public function store(Request $request)
    {
        $item = Lecturer_courses::latest()->where("course_id", "=", $request->course_id)
            ->where("user_id", "=", $request->user_id)
            ->get();
        // dd($item, $request, !$item->isEmpty());

        if (!$item->isEmpty()) {
            return back()->with("message", "This course is already in the list");
        }
        $formFields = $request->validate([
            "user_id" => "required",
            "course_id" => "required"
        ]);

        Lecturer_courses::create($formFields);


        return back()->with("message", "Course added successfully!");
    }

    // destroy Lecturer_courses data 
    public function destroy(Lecturer_courses $lecturer_courses)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $lecturer_courses->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
