<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show user form
    public function create() {
        return view("users.register");
    }
    // store user form
    public function store(Request $request) {
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "role" => "required",
            "phoneNumber" => "required",
            "password" => "required|confirmed|min:6",
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);

        return redirect("/login")->with("message", "User created successfully!");
    }
    // show user login form
    public function login() {
        return view("users.login");
    }
    // authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            "role" => "required",
            "email" => ['required', 'email'],
            "password" => "required",
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => "Invalid Credentials"])->onlyInput('email');
    }
    // logout User
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }
}