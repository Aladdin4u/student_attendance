<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // show all section
    public function index()
    {
        return view("sections.index", [
            "sections" => Section::all()
        ]);
    }

    // show section sections
    public function show(Section $section)
    {
        return view("sections.show", ["section" => $section]);
    }

    // show create section form
    public function create()
    {
        return view("sections.create");
    }

    // store section data
    public function store(Request $request)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "semester" => "required",
            "year" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);

        Section::create($formFields);

        return back()->with("message", "Section created successfully!");
    }

    // show section edit form
    public function edit(Section $section)
    {
        return view("sections.edit", ["section" => $section]);
    }

    // show edit section form
    public function update(Request $request, Section $section)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "semester" => "required",
            "year" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);

        $section->update($formFields);

        return redirect("/sections/manage")->with("message", "Section updated successfully!");
    }

    // destroy section data
    public function destory(Section $section)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $section->delete();

        return back()->with("message", "section Deleted Successfully!");
    }

    // manage section
    public function manage()
    {
        return view("sections.manage");
    }
}
