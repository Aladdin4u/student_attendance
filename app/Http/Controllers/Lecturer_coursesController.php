<?php

namespace App\Http\Controllers;

use App\Models\Lecturer_courses;
use Illuminate\Http\Request;

class Lecturer_coursesController extends Controller
{
    // store form data
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            "user_id" => "required",
            "course_id" => "required"
        ]);

        Lecturer_courses::insert($formFields);


        return back()->with("message", "Course assigned successfully!");
    }
}
