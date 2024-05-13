<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Section;
use App\Models\Department;
use App\Models\Programmee;
use Illuminate\Http\Request;
use App\Models\PersonalDetail;
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
        $levels = Level::all(['id', 'name']);
        $sections = Section::first()->where('is_active', 1)->get(['id', 'session']);

        $departments = Department::all(['id', 'name']);

        return view("students.create", [
            "levels" => $levels,
            "sections" => $sections,
            "departments" => $departments,
        ]);
    }
    // store form data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "phoneNumber" => "required",
            "department_id" => "required",
            "level_id" => "required",
            "section_id" => "required",
            "email" => 'required|unique:users',
        ]);

        $pass = strtoupper($formFields['firstName']);

        $loginDetails = [
            "role" => 'student',
            "email" => $formFields['email'],
            "password" => bcrypt($pass),
        ];

        $user = User::create($loginDetails);

        $contactDetails = [
            "firstName" => $formFields['firstName'],
            "lastName" => $formFields['lastName'],
            "otherName" => $formFields['otherName'],
            "phoneNumber" => $formFields['phoneNumber'],
            "user_id" => $user->id,
        ];

        PersonalDetail::create($contactDetails);
        $departmentDetails = [
            "department_id" => $formFields['department_id'],
            "user_id" => $user->id,
        ];

        $year = Carbon::now()->format('Y');
        $count = User::where('role', 'student')->count() + 1;

        if ($count < 10) {
            $count = '00000' . $count;
        } else if ($count >= 10) {
            $count = '0000' . $count;
        } else if ($count >= 100) {
            $count = '000' . $count;
        } else if ($count >= 1000) {
            $count = '00' . $count;
        } else if ($count >= 10000) {
            $count = '0' . $count;
        } else {
            $count;
        }

        $departmentDetails["regNumber"] = $year . '/' . $count;

        StudentAdmission::create($departmentDetails);

        $program = [
            "user_id" => $user->id,
            "level_id" => $formFields['level_id'],
            "section_id" => $formFields['section_id'],
        ];

        Programmee::create($program);

        return back()->with("message", "Student admission is successfully!");
    }

    // show edit form
    public function edit(StudentAdmission $student)
    {
        $departments = Department::all(['id', 'name']);

        return view("students.edit", [
            "student" => $student,
            "departments" => $departments
        ]);
    }

    // update form data
    public function update(Request $request, StudentAdmission $student)
    {
        $formFields = $request->validate([
            "department_id" => "required",
        ]);

        $student->update($formFields);
        $user = $student->user_id;

        return redirect("/users/" . $user)->with("message", "Student admission updated Successfully!");
    }

    // manage student
    public function manage(StudentAdmission $student, StudentsDataTable $dataTable)
    {
        return $dataTable->render("students.manage");
    }
}
