<?php

namespace App\Http\Controllers;

use App\Models\Courses_offer;
use App\Models\User;
use Illuminate\Http\Request;

class Courses_offerController extends Controller
{
    // store form data
    public function store(Request $request)
    {
        $ifCourseExist = User::find("user_id",$request->user_id)->courses();
        
        if($ifCourseExist->isEmpty()) {
            return back()->with("message", "Student registration is not completed!");
        }
        $item = Courses_offer::latest()->where("course_id", "=", $request->course_id)
            ->where("user_id", "=", $request->user_id)
            ->get();

        if (!$item->isEmpty()) {
            return back()->with("message", "This course is already in the list");
        }
        $formFields = $request->validate([
            "user_id" => "required",
            "course_id" => "required"
        ]);

        Courses_offer::create($formFields);


        return back()->with("message", "Course added successfully!");
    }

    // destroy student_courses data 
    public function destroy(Courses_offer $courses_offer)
    {
        $courses_offer->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
