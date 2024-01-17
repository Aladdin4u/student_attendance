<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\DataTables\StudentsDataTable;
use App\DataTables\LecturerStudentsDataTable;
use App\Models\User;

class StudentController extends Controller
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
    public function show(Student $student)
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
        $user = User::find($request->user_id);
        // dd($user, $user->firstName, $request);

        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "regNumber" => "required",
            "department" => "required",
            "user_id" => "required",
        ]);

        Student::create($formFields);

        return back()->with("message", "Student created successfully!");
    }

    // show user login form
    public function login()
    {
        return view("students.login");
    }
    // show user login form
    public function dashboard()
    {
        return view("students.dashboard");
    }

    // authenticate Student
    public function authenticate(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            "email" => ['required', 'email'],
            "password" => "required",
        ]);

        if (auth()->guard('student')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/student/dashboard')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => "Invalid Credentials"])->onlyInput('email');
    }

    // show edit form
    public function edit(Student $student)
    {
        return view("students.edit", ["student" => $student]);
    }

    // update form data
    public function update(Request $request, Student $student)
    {
        // dd($request);
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "regNumber" => "required",
            "level" => "required",
        ]);

        $student->update($formFields);

        return redirect("/students/manage")->with("message", "Student Updated Successfully!");
    }

    // destroy student data 
    public function destroy(Student $student)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $student->delete();

        return redirect("/students")->with("message", "Student Deleted Successfully!");
    }

    public function manage(Student $student, StudentsDataTable $dataTable)
    {
        return $dataTable->render("students.manage");
    }
}
