<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Department;
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
        $departments = Department::all(['id', 'name']);

        return view("students.create", ["departments" => $departments]);
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
            "email" => 'required|unique:users',
        ]);

        $loginDetails = [
            "role" => 'student',
            "email" => $formFields['email'],
            "password" => bcrypt($formFields['firstName']),
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

        $year = Carbon::now()->format('y');
        $count = User::where('role', 'student')->count() + 1;

        if ($count > 10) {
            $count = '00' . $count;
        } else if ($count > 100) {
            $count = '0' . $count;
        } else {
            $count;
        }

        $departmentDetails["regNumber"] = 'REG/' . $year . '/' . $count;

        StudentAdmission::create($departmentDetails);

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

        return redirect("/users/".$user)->with("message", "Student admission updated Successfully!");
    }
}
