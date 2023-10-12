<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // show all students
    public function index() {
        return view("students.index", [
            "students" => Student::all()
        ]);
    }

    // show student students
    public function show(Student $student) {
        return view("students.show", [
            "student" => $student
        ]);
    }

    // show create form
    public function create() {
        return view("students.create");
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

        Student::create($formFields);

        return redirect("/students")->with("message", "Student created successfully!");
    }

    // show edit form
    public function edit(Student $student) {
        return view("students.edit", ["student" => $student]);
    }

     // update form data
     public function update(Request $request, Student $student) {
        // dd($request);
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "regNumber" => "required",
            "level" => "required",
        ]);

        $student->update($formFields);

        return back()->with("message", "Student Updated Successfully!");
    }

    // destroy student data 
    public function destroy(Student $student) {
        if(auth()->role != "admin"){
            abort(403, "Unauthorized Action");
        }

        $student->delete();

        return redirect("/students")->with("message", "Student Deleted Successfully!");
    }

    public function manage($student) {
        // dd(Student::find($student)->course);
        if(!Student::find($student)){
            abort(404, "Not Found");
        }
        return view("students.manage", ["courses" => Student::find($student)->course]);
    }
}
