<?php

namespace App\Http\Controllers;

use App\Models\Lession;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // show create form
    public function create() {
        $lessions = Lession::join("students", "lessions.student_id", "=", "students.id", "left")
        ->join("courses", "lessions.course_id", "=", "courses.id", "left")
        ->join("attendances", "lessions.attendance_id", "=", "attendances.id", "left")
        ->join("users", "lessions.lecturer_id", "=", "users.id", "left")
        ->get(["lessions.id", "students.firstName", "students.lastName", "courses.code", "courses.title", "attendances.is_present", "attendances.date", "attendances.created_at", "users.role"])->where("is_present", null)->where("role", Auth()->user()->role);

        dd($lessions);
        // $students = Student::join("courses","students.id", "=", "courses.id")->get();
        // dd($students);
        return view("attendances.create", [
            "attendances" => $lessions
        ]);
    }
}
