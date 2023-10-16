<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lession;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     // show attendance
     public function show(Attendance $attendance) {
        
        return view("attendances.show", [
            "attendance" => $attendance
        ]);
    }

    // show create form
    public function create() {
        $course = Lession::join("courses", "lessions.course_id", "=", "courses.id")->first();
        // dd($course);
        $lessions = Lession::join("students", "lessions.student_id", "=", "students.id", "left")
        ->join("courses", "lessions.course_id", "=", "courses.id", "left")
        ->join("users", "lessions.lecturer_id", "=", "users.id", "left")
        ->get(["lessions.id", "students.firstName", "students.lastName", "students.otherName", "students.regNumber", "students.level","courses.code", "courses.title", "users.id AS lecturer_id"])
        ->where("lecturer_id", 2);
        // ->where("lecturer_id", Auth()->user()->role);

        // dd($lessions);
        // $students = Student::join("courses","students.id", "=", "courses.id")->get();
        // dd($students);
        return view("attendances.create", [
            "attendances" => $lessions
        ]);
    }

    // store form data
    public function store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            "is_present" => "required",
            "date" => "required",
            "student_id" => "required",
            "course_id" => "required"
        ]);

        Attendance::create($formFields);

        return redirect("/students")->with("message", "Student created successfully!");
    }
}
