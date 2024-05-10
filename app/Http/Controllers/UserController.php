<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Mail\UserLogin;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CoursesOffer;
use Illuminate\Validation\Rule;
use App\DataTables\UsersDataTable;
use App\Models\Faculty;
use App\Models\PersonalDetail;
use App\Models\Programmee;
use App\Models\StudentAdmission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    // show admin dashboard
    public function adminDashboard()
    {
        $lecturer = User::where('role', 'lecturer')->count();
        $class = CoursesOffer::where('user_id', auth()->user()->id)->get();
        $courses = Course::all();
        $attendance = Attendance::latest()->where(request(['course_id']) ?? false)->get();
        $student = User::where('role', 'student')->count();
        // dd($student);

        return view("users.dashboard", [
            "allStudent" => $student,
            "allLecturer" => $lecturer,
            "classes" => count($class) > 0 ? $class->count() : 0,
            "courses" => $courses,
            "attendance" => $attendance
        ]);
    }
    // show Lecturer dashboard
    public function lecturerDashboard()
    {
        $lecturer = User::where('role', 'lecturer')->count();
        $class = CoursesOffer::where('user_id', auth()->user()->id)->get();
        $courses = Course::all();
        $attendance = Attendance::latest()->where(request(['course_id']) ?? false)->get();
        if (count($class) > 0) {
            $item = [];
            foreach ($class as $c) {
                $item = CoursesOffer::where('course_id', $c->course_id);
            }
            $student = $item->count();
        } else {
            $student = 0;
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
    // show student dashboard
    public function dashboard()
    {
        $class = CoursesOffer::where('user_id', auth()->user()->id)->count();
        $courses = Course::all();
        $attendance = Attendance::latest()->where(request(['course_id']) ?? false)->get();
        // dd($class);

        return view("students.dashboard", [
            "classes" => $class,
            "courses" => $courses,
            "attendance" => $attendance
        ]);
    }

    // show user form
    public function create()
    {
        return view("users.register");
    }
    // show lecturer form
    public function createLecturer()
    {
        return view("lecturers.create");
    }
    // store user form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "role" => "required",
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "phoneNumber" => "required",
            "email" => 'required|unique:users',
            "password" => "required|confirmed|min:8"
        ]);


        $loginDetails = [
            "role" => $formFields['role'],
            "email" => $formFields['email'],
            "password" => bcrypt($formFields['password']),
        ];

        $user = User::create($loginDetails);

        $contactDetails = [
            "firstName" => $formFields['firstName'],
            "lastName" => $formFields['lastName'],
            "otherName" => $formFields['otherName'],
            "phoneNumber" => $formFields['phoneNumber'],
            "user_id" => $user->id,
        ];

        PersonalDetail::create($contactDetails);

        return redirect("/login")->with("message", "User created successfully!");
    }
    // store lecturer form
    public function storeLecturer(Request $request)
    {
        $formFields = $request->validate([
            "role" => "required",
            "firstName" => "required",
            "lastName" => "required",
            "otherName" => "required",
            "phoneNumber" => "required",
            "email" => 'required|unique:users',
        ]);

        $pass = strtoupper($formFields['firstName']);

        $loginDetails = [
            "role" => $formFields['role'],
            "email" => $formFields['email'],
            "password" => bcrypt($pass),
        ];

        $user = User::create($loginDetails);

        $contactDetails = [
            "firstName" => $formFields['firstName'],
            "lastName" => $formFields['lastName'],
            "otherName" => $formFields['otherName'],
            "phoneNumber" => $formFields['phoneNumber'],
            "user_id" => $user->id,
        ];

        PersonalDetail::create($contactDetails);

        return back()->with("message", "Lecturer created successfully!");
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

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('message', 'You are now logged in!');
            } else if (auth()->user()->role == 'lecturer') {
                return redirect()->route('lecturer.dashboard')->with('message', 'You are now logged in!');
            } else {
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
        $user->delete();

        return back()->with("message", "User Deleted Successfully!");
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
        $contact = User::find($user->id)->contacts()->get();
        $admission = StudentAdmission::where('student_admissions.user_id', '=', $user->id)
            ->join('departments', 'student_admissions.department_id', '=', 'department_id')
            ->get(['student_admissions.id as student_id', 'regNumber', 'name as departmentName', 'faculty_id']);

        if (!$admission->isEmpty()) {
            $faculty = Faculty::first()
                ->where('id', $admission[0]->faculty_id)
                ->get('name');
        }

        $programmee = Programmee::where('user_id', $user->id)
            ->join('levels', 'programmees.level_id', '=', 'levels.id')
            ->join('sections', 'programmees.section_id', '=', 'sections.id')
            ->where('sections.is_active', 1)
            ->get(['level_id', 'name', 'semester', 'start_date']);

        return view("users.show", [
            "user" => $user,
            "contact" => $contact,
            "admissions" => $admission,
            "faculty" => $faculty ?? "",
            "programmees" => $programmee,
        ]);
    }

    public function manage(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.manage');
    }
}
