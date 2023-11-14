<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\DataTables\LecturerStudentsDataTable;
use App\Models\Lecturer_courses;
use App\Models\Student_courses;

class StudentController extends Controller
{
    // show all students
    public function index(LecturerStudentsDataTable $dataTable)
    {
        return $dataTable->render("students.index");
    }

    // show student students
    public function show(Student $student, Request $request)
    {
        $student_course = $student->student_courses()->join("courses", "student_courses.course_id", "=", "courses.id")->get(["student_courses.id", "courses.id  as courses_id", "courses.title", "courses.code"]);
        $attendances = Attendance::where("student_id", $student->id)
            ->join("students", "attendances.student_id", "=", "students.id", "left")
            ->join("courses", "attendances.course_id", "=", "courses.id", "left")
            ->where("code", request(["tag"]) ?? false)
            ->get();
            $lc = Lecturer_courses::where("user_id", auth()->user()->id)->get(["course_id"])->first();
            $total= Student_courses::where('student_courses.course_id', $lc->course_id)->join("students", "student_courses.student_id", "=", "students.id")
            ->join("courses", "student_courses.course_id", "=", "courses.id")
            ->select('student_courses.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.level', 'courses.code', 'courses.title')->get();
            $att = Attendance::where("student_id", 2)->where("is_present", "present")->count();
        $course = Course::all();
        dd($total, $att);
        return view("students.show", [
            "student" => $student,
            "courses" => $course,
            "attendances" => $attendances,
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
        dd($request);
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

        Student::create($formFields);

        return back()->with("message", "Student created successfully!");
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
