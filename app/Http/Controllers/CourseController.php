<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Course;
use App\Models\Department;
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
        $levels = Level::all();
        $departments = Department::all();

        return view("courses.create", [
            'levels' => $levels,
            'departments' => $departments,
        ]);
    }
    // store form data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "code" => 'required|unique:courses',
            "title" => "required",
            "unit" => "required",
            "level_id" => "required",
            "department_id" => "required",
        ]);

        Course::create($formFields);

        return back()->with("message", "Course created successfully!");
    }

    // show edit form
    public function edit(Course $course)
    {
        $levels = Level::all();
        $departments = Department::all();

        return view("courses.edit", [
            "course" => $course,
            'levels' => $levels,
            'departments' => $departments,
        ]);
    }

    // update form data
    public function update(Request $request, Course $course)
    {
        $formFields = $request->validate([
            "code" => "required|unique:courses,code," . $course->id,
            "title" => "required",
            "unit" => "required",
            "level_id" => "required",
            "department_id" => "required",
        ]);

        $course->update($formFields);

        return redirect("/courses/manage")->with("message", "Course Updated Successfully!");
    }

    // destroy course data 
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with("message", "course Deleted Successfully!");
    }

    // manage course 
    public function manage(CoursesDataTable $dataTable)
    {

        return $dataTable->render("courses.manage");
    }
}
