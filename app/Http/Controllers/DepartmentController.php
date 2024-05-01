<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use App\DataTables\DepartmentDataTable;

class DepartmentController extends Controller
{
    // show department form
    public function create()
    {
        $faculties = Faculty::all();
        return view("departments.create", ['faculties' => $faculties]);
    }

    // store department form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => "required",
            "faculty_id" => "required",
        ]);

        Department::create($formFields);

        return redirect("/departments/manage")->with("message", "User created successfully!");
    }

    // show department edit form
    public function edit(Department $department)
    {
        $faculties = Faculty::all();
        return view("departments.edit", ["department" => $department, 'faculties' => $faculties]);
    }

    // update department form
    public function update(Request $request, Department $department)
    {
        $formFields = $request->validate([
            "name" => "required",
            "faculty_id" => "required",
        ]);

        $department->update($formFields);

        return redirect("/departments/manage")->with("message", "Department updated successfully!");
    }

    // destroy department
    public function destroy(Department $department)
    {
        $department->delete();

        return back()->with("message", "Department deleted successfully!");
    }

    // manage department
    public function manage(DepartmentDataTable $dataTable)
    {
        return $dataTable->render('departments.manage');
    }
}
