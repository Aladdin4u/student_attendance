<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lession;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Lecturer_courses;
use App\Models\Student_courses;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // show all students
    public function index()
    {
        $attendances = Attendance::join("students", "attendances.student_id", "=", "students.id", "left")
            ->join("courses", "attendances.course_id", "=", "courses.id", "left")->get();
        // dd($attendances);
        return view("attendances.index", [
            "attendances" => $attendances
        ]);
    }
    // show attendance
    public function show(Attendance $attendance)
    {

        return view("attendances.show", [
            "attendance" => $attendance
        ]);
    }

    // show create form
    public function create()
    {
        $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->get(["course_id"])->first();
        $lecturer_student = Student_courses::where("course_id", $lc->course_id)
            ->join("students", "student_courses.student_id", "=", "students.id")
            ->join("courses", "Student_courses.course_id", "=", "courses.id")
            ->get();
        $attendances = Attendance::all();

        // dd($lecturer_student);
        return view("attendances.create", [
            "attendances" => $lecturer_student,
            "all" => $attendances,
        ]);
    }

    // store form data
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            "is_present" => "required",
            "date" => "required",
            "student_id" => "required",
            "course_id" => "required"
        ]);

        Attendance::create($formFields);


        return redirect("/attendances")->with("message", "Attendance created successfully!");
    }

    // destroy attendance data 
    public function destroy(Attendance $attendance)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $attendance->delete();

        return redirect("/attendances")->with("message", "Attendance Deleted Successfully!");
    }
}
