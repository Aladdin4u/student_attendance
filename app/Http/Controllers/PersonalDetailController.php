<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    // show edit form
    public function edit(PersonalDetail $user)
    {
        return view("users.edit", ["user" => $user]);
    }
    // update form data
    public function update(Request $request, PersonalDetail $user)
    {
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "phoneNumber" => "required",
        ]);

        $user->update($formFields);

        return back()->with("message", "Profile Updated Successfully!");
    }
}
