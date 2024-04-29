<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\DataTables\CoursesDataTable;

class CourseController extends Controller
{
    // course api
    public function index(Request $request)
    {
        $course = Course::find($request->id)->lectures()->whereNot("users.role", "lecturer")->join('courses', 'courses_offers.course_id', '=', 'courses.id')
            ->select('courses.id as course_id', 'courses.code', 'courses.title')->get();

        return response()->json($course);
    }

    // show create form
    public function create()
    {
        $c = Course::find(1)->lectures()->whereNot("users.role", "lecturer")->join('students', 'users.id', '=', 'students.user_id')->join('courses', 'courses_offers.course_id', '=', 'courses.id') ->select('users.id as id','users.firstName', 'users.lastName', 'students.otherName', 'students.regNumber', 'students.department', 'courses.code', 'courses.title');
        dd($c);
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
            "department" => "required",
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
            "department" => "required",
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
