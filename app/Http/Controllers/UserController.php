<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Lecturer_courses;
use App\DataTables\UsersDataTable;
use App\Mail\ForgotPasswordMail;
use App\Models\Student_courses;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    // show user dashboard
    public function dashboard()
    {
        $lecturer = User::where('role', 'lecturer')->count();
        $class = Lecturer_courses::where('user_id', auth()->user()->id)->get();
        $courses = Course::all();
        $attendance = Attendance::latest()->where(request(['course_id']) ?? false)->get();
        if (auth()->user()->role === "admin") {
            $student = Student::count();
        } else {
            if(count($class) > 0) {
                $item = [];
                foreach($class as $c){
                    $item = Student_courses::where('course_id', $c->course_id);
                }
                $student = $item->count();
            } else {
                $student = 0;
            }
        }
        // dd($student);

        return view("users.dashboard", [
            "allStudent" => $student,
            "allLecturer" => $lecturer,
            "classes" => count($class) > 0 ? $class->count() : 0,
            "courses" => $courses,
            "attendance" => $attendance
        ]);
    }
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
            "password" => "required|confirmed|min:8"
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
            "email" => ['required', 'email'],
            "password" => "required",
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // return redirect('/')->with('message', 'You are now logged in!');
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('message', 'You are now logged in!');
            }else if (auth()->user()->role == 'lecturer') {
                return redirect()->route('lecturer.dashboard')->with('message', 'You are now logged in!');
            }else{
                return redirect()->route('student.dashboard')->with('message', 'You are now logged in!');
            }
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

    // show user forget password form
    public function forgotPassword()
    {
        return view("users.forget-password");
    }

    // reset user password
    public function forgotPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('message', __($status))
            : back()->withErrors('email', __($status));
    }

    // show reset token
    public function PasswordReset(string $token)
    {
        return view('users.reset-password', ['token' => $token]);
    }

    // password reset token
    public function PasswordUpdate(Request $request)
    {
        // dd($request);
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message', __($status))
            : back()->withErrors('email', __($status));
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
        
    }

    public function index(User $user, UsersDataTable $dataTable)
    {
        return view("users.index", [
            "users" => $user::latest()->where("role", "=", "lecturer")->filter(request(["search"]))->paginate(6)
        ]);
        // return $dataTable->render('users.index');
    }
}
