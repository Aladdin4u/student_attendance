<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DepartmentDataTable;
use App\Models\Department;

class DepartmentController extends Controller
{
    // show department form
    public function create()
    {
        return view("departments.create");
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
        return view("departments.edit", ["department" => $department]);
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

    // manage department
    public function manage(DepartmentDataTable $dataTable)
    {
        return $dataTable->render('departments.manage');
    }
}
