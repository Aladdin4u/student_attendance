<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;

class LevelController extends Controller
{
    // show level form
    public function create()
    {
        return view("levels.create");
    }

    // store level form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => "required",
        ]);

        Level::create($formFields);

        return redirect("/levels/manage")->with("message", "User created successfully!");
    }

    // show level edit form
    public function edit(Level $level)
    {
        return view("levels.edit", ["level" => $level]);
    }

    // update level form
    public function update(Request $request, Level $level)
    {
        $formFields = $request->validate([
            "name" => "required",
        ]);

        $level->update($formFields);

        return redirect("/levels/manage")->with("message", "Level updated successfully!");
    }

    // destroy level
    public function destroy(Level $level)
    {
        $level->delete();

        return back()->with("message", "Level deleted successfully!");
    }

    // manage level
    public function manage(LevelDataTable $dataTable)
    {
        return $dataTable->render('levels.manage');
    }
}
