<?php

namespace App\Http\Controllers;

use App\DataTables\CoursesDataTable;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // show all courses
    public function index()
    {
        return view("courses.index", [
            "courses" => Course::all()
        ]);
    }
    // show course courses
    public function show(Course $course)
    {
        return view("courses.show", [
            "course" => $course
        ]);
    }
    // show create form
    public function create()
    {
        return view("courses.create");
    }
    // store form data
    public function store(Request $request)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "code" => "required",
            "title" => "required",
            "semester" => "required",
            "session" => "required",
        ]);

        Course::create($formFields);

        return back()->with("message", "Course created successfully!");
    }

    // show edit form
    public function edit(Course $course)
    {
        return view("courses.edit", ["course" => $course]);
    }

    // update form data
    public function update(Request $request, Course $course)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "code" => "required",
            "title" => "required",
            "semester" => "required",
            "session" => "required",
        ]);

        $course->update($formFields);

        return redirect("/courses/manage")->with("message", "Course Updated Successfully!");
    }

    // destroy course data 
    public function destroy(Course $course)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $course->delete();

        return back()->with("message", "course Deleted Successfully!");
    }

    // manage course 
    public function manage(CoursesDataTable $dataTable)
    {

        return $dataTable->render("courses.manage");
    }
}
