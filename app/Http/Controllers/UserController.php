<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecturer_courses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\JoinClause;

class UserController extends Controller
{
    // show user form
    public function create()
    {
        return view("users.register");
    }
    // store user form
    public function store(Request $request)
    {
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
    public function login()
    {
        return view("users.login");
    }
    // authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "role" => "required",
            "email" => ['required', 'email'],
            "password" => "required",
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => "Invalid Credentials"])->onlyInput('email');
    }
    // logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }

    // destroy user data 
    public function destroy(User $user)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $user->delete();

        return back()->with("message", "Lecturer Deleted Successfully!");
    }

    // show single users
    public function show(User $user)
    {
        $lecturer_course = $user->lecturer_courses()->join("courses", "lecturer_courses.course_id", "=", "courses.id")->get(["lecturer_courses.id", "courses.id  as courses_id", "courses.title", "courses.code"]);
        // dd($lecturer_course);
        $course = Course::all();
        return view("users.show", [
            "user" => $user,
            "courses" => $course,
            "user_courses" => $lecturer_course,
        ]);
    }

    public function manage(User $user, UsersDataTable $dataTable)
    {
        return $dataTable->render('users.manage');
        // return view("users.manage", [
        //     "users" => $user::latest()->where("role", "=", "lecturer")->filter(request(["search"]))->paginate(6)
        // ]);
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }
}
