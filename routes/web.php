<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Lecturer_coursesController;
use App\Http\Controllers\LessionController;
use App\Http\Controllers\Student_coursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// show user create form
Route::get('/register', [UserController::class, 'create']);
// store user
Route::post('/register', [UserController::class, 'store']);
// show user login form
Route::get('/login', [UserController::class, 'login'])->name('login');
// show forget password
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->middleware('guest');
// reset forget password
Route::post('/forgot-password', [UserController::class, 'forgotPasswordEmail'])->middleware('guest');
// get reset password token
Route::get('/reset-password/{token}', [UserController::class, 'PasswordReset'])->middleware('guest')->name('password.reset');
// reset password
Route::post('/reset-password', [UserController::class, 'PasswordUpdate'])->middleware('guest')->name('password.update');
// login user
Route::post('/login', [UserController::class, 'authenticate']);
// log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashbord
    Route::get('/', [UserController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');
    // get all user
    Route::get('/users', [UserController::class, 'index'])->middleware('auth');
    // manage user
    Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');
    // show single user
    Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth');
    // show all students
    Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
    // show students dashboard
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->middleware('auth');
    // store student
    Route::post('/students', [StudentController::class, 'store'])->middleware('auth');
    // show student create form
    Route::get('/students/create', [StudentController::class, 'create'])->middleware('auth');
    // show student edit form
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    // update student edit form
    Route::put('/students/{student}', [StudentController::class, 'update']);
    // destroy student
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);
    // manage student
    Route::get('/students/manage', [StudentController::class, 'manage']);
    // show single student
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.list');
    // store student courses
    Route::post('/students/courses', [Student_coursesController::class, 'store']);
    // destroy student courses
    Route::delete('/students_courses/{student_courses}', [Student_coursesController::class, 'destroy']);
    // store lecturer courses
    Route::post('/lecturers/courses', [Lecturer_coursesController::class, 'store']);
    // destroy lecturer courses
    Route::delete('/lecturers_courses/{lecturer_courses}', [Lecturer_coursesController::class, 'destroy']);
    // show all course
    Route::get('/courses', [CourseController::class, 'index']);
    // show course create form
    Route::get('/courses/create', [CourseController::class, 'create']);
    // store course create form
    Route::post('/courses', [CourseController::class, 'store']);
    // edit course form
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
    // update course edit form
    Route::put('/courses/{course}', [CourseController::class, 'update']);
    // destroy course
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
    // manage courses
    Route::get('/courses/manage', [CourseController::class, 'manage']);
    // show single course
    Route::get('/courses/{course}', [CourseController::class, 'show']);
    // show all attendances
    Route::get('/attendances', [AttendanceController::class, 'index']);
    // show attendance create form
    Route::get('/attendances/create', [AttendanceController::class, 'create']);
    // store attendance create form
    Route::post('/attendances', [AttendanceController::class, 'store']);
    // destroy attendendance
    Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy']);
    // manage attendances
    Route::get('/attendances/manage', [AttendanceController::class, 'manage']);
    // show single attendance
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show']);
});

Route::middleware(['auth', 'lecturer'])->group(function () {
    // Lecturer dashboard
    Route::get('/', [UserController::class, 'dashboard'])->name('lecturer.dashboard');
    // store lecturer courses
    Route::post('/lecturers/courses', [Lecturer_coursesController::class, 'store']);
    // destroy lecturer courses
    Route::delete('/lecturers_courses/{lecturer_courses}', [Lecturer_coursesController::class, 'destroy']);
    // show attendance create form
    Route::get('/attendances/create', [AttendanceController::class, 'create']);
    // store attendance create form
    Route::post('/attendances', [AttendanceController::class, 'store']);
    // destroy attendendance
    Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy']);
    // manage attendances
    Route::get('/attendances/manage', [AttendanceController::class, 'manage']);
    // show single attendance
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show']);
});
Route::middleware(['auth', 'student'])->group(function () {
    // Lecturer dashbord
    Route::get('/', [UserController::class, 'dashboard'])->name('student.dashboard');
    // show student edit form
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    // update student edit form
    Route::put('/students/{student}', [StudentController::class, 'update']);
    // show single student
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.list');
    // store student courses
    Route::post('/students/courses', [Student_coursesController::class, 'store']);
    // destroy student courses
    Route::delete('/students_courses/{student_courses}', [Student_coursesController::class, 'destroy']);
});


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show show form to edit listing
// update - Update listing
// destroy - Delete listing