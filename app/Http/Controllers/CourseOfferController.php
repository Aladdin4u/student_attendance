<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CoursesOffer;
use App\DataTables\LecturesDataTable;
use App\DataTables\LecturerStudentsDataTable;
use App\Models\Course;

class CourseOfferController extends Controller
{
    // lecturer lecture
    public function index(LecturesDataTable $dataTable)
    {
        return $dataTable->render('lecturers.index');
    }

    // show lecturer lecture
    public function show($lecture,LecturerStudentsDataTable $dataTable)
    {
        return $dataTable->with('course_id', $lecture)->render('lecturers.show');
    }

    // store form data
    public function store(Request $request)
    {
        $ifCourseExist = User::find("user_id", $request->user_id)->courses();

        if ($ifCourseExist->isEmpty()) {
            return back()->with("message", "Student registration is not completed!");
        }
        $item = CoursesOffer::latest()->where("course_id", "=", $request->course_id)
            ->where("user_id", "=", $request->user_id)
            ->get();

        if (!$item->isEmpty()) {
            return back()->with("message", "This course is already in the list");
        }
        $formFields = $request->validate([
            "user_id" => "required",
            "course_id" => "required"
        ]);

        CoursesOffer::create($formFields);


        return back()->with("message", "Course added successfully!");
    }

    // destroy student_courses data 
    public function destroy(CoursesOffer $courses_offer)
    {
        $courses_offer->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
