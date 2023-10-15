<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lession;
use App\Models\Student;
use Illuminate\Http\Request;

class LessionController extends Controller
{
    // show all lessions
    public function index() {
        $lession = Lession::join("students", "lessions.student_id", "=", "students.id", "left")
        ->join("courses", "lessions.course_id", "=", "courses.id", "left")->get();
        // dd($lession);
        return view("lessions.index", [
            "lessions" => $lession
        ]);
    }

    // show single lession
    public function show(Lession $lession) {
        $student = $lession->students()->get()->first();
        $course = $lession->courses()->get()->first();
        $attendance = $lession->attendances()->get()->first();
        // dd($lession->attendance_id);
        return view("lessions.show", [
            "lessionStudent" => $student,
            "lessionCourse" => $course,
            "lessionAttendance" => $lession
        ]);
    }

    // show create form
    public function create() {
        return view("lessions.create");
    }
    // store form data
    public function store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "regNumber" => "required",
            "level" => "required",
        ]);

        lession::create($formFields);

        return redirect("/lessions")->with("message", "lession created successfully!");
    }

    // show edit form
    public function edit(Lession $lession) {
        return view("lessions.edit", ["lession" => $lession]);
    }

     // update form data
     public function update(Request $request, lession $lession) {
        // dd($request);
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "regNumber" => "required",
            "level" => "required",
        ]);

        $lession->update($formFields);

        return redirect("/lessions/manage")->with("message", "lession Updated Successfully!");
    }

    // destroy lession data 
    public function destroy(Lession $lession) {
        if(auth()->user()->role != "admin"){
            abort(403, "Unauthorized Action");
        }

        $lession->delete();

        return redirect("/lessions/manage")->with("message", "lession Deleted Successfully!");
    }

    public function manage(Lession $lession) {

        // return view("lessions.manage", [
        //     "lessions" => $lession::latest()->filter(request(["search"]))->paginate(6)
        // ]);
    }
}
