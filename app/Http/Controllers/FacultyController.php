<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\DataTables\FacultyDataTable;

class FacultyController extends Controller
{
    // show faculty form
    public function create()
    {
        return view("faculties.create");
    }

    // store faculty form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => "required",
        ]);

        Faculty::create($formFields);

        return redirect("/faculties/manage")->with("message", "User created successfully!");
    }

    // show faculty edit form
    public function edit(Faculty $faculty)
    {
        return view("faculties.edit", ["faculty" => $faculty]);
    }

    // update faculty form
    public function update(Request $request, Faculty $faculty)
    {
        $formFields = $request->validate([
            "name" => "required",
        ]);

        $faculty->update($formFields);

        return redirect("/faculties/manage")->with("message", "Faculty updated successfully!");
    }

    // manage faculty
    public function manage(FacultyDataTable $dataTable)
    {
        return $dataTable->render('faculties.manage');
    }
}
