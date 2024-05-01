<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\StudentAdmission;
use App\DataTables\StudentsDataTable;
use App\DataTables\LecturerStudentsDataTable;

class StudentAdmissionController extends Controller
{
    // show all students
    public function index(LecturerStudentsDataTable $dataTable, Request $request)
    {
        if ($request->filled('course_id')) {
            // dd($request->course_id);
            return $dataTable->with('course_id', $request->course_id)->render("students.index");
        }
        return $dataTable->render("students.index");
    }

    // show student students
    public function show(StudentAdmission $student)
    {
        $student_course = $student->student_courses()->join("courses", "student_courses.course_id", "=", "courses.id")->get(["student_courses.id", "courses.id  as courses_id", "courses.title", "courses.code"]);
        $course = Course::all();

        return view("students.show", [
            "student" => $student,
            "courses" => $course,
            "student_courses" => $student_course,
        ]);
    }

    // show create form
    public function create()
    {
        return view("students.create");
    }
    // store form data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "department_id" => "required",
            "user_id" => "required",
        ]);

        $year = Carbon::now()->format('y');
        $dept = Department::find($request->department_id);
        $count = User::where('role', 'student')->count() + 1;
        // dd($dept, $dept->name, $count);

        if ($count > 10) {
            $count = '00' . $count;
        } else if ($count > 100) {
            $count = '0' . $count;
        } else {
            $count;
        }

        $formFields["regNumber"] = 'REG/' . $year . '/' . $count;

        StudentAdmission::create($formFields);

        return back()->with("message", "Admission number generated successfully!");
    }

    // show edit form
    public function edit(StudentAdmission $student)
    {
        return view("students.edit", ["student" => $student]);
    }

    // update form data
    public function update(Request $request, StudentAdmission $student)
    {

        $formFields = $request->validate([
            "department" => "required",
        ]);

        $student->update($formFields);

        return redirect("/students/manage")->with("message", "Department changed Successfully!");
    }

    public function manage(StudentAdmission $student, StudentsDataTable $dataTable)
    {
        return $dataTable->render("students.manage");
    }
}
