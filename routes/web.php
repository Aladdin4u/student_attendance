<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseOfferController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\Lecturer_coursesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Student_coursesController;
use App\Http\Controllers\StudentAdmissionController;
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
Route::get('/forgot-password', [UserController::class, 'forgotPassword']);
// reset forget password
Route::post('/forgot-password', [UserController::class, 'forgotPasswordEmail']);
// get reset password token
Route::get('/reset-password/{token}', [UserController::class, 'PasswordReset'])->name('password.reset');
// reset password
Route::post('/reset-password', [UserController::class, 'PasswordUpdate'])->name('password.update');
// login user
Route::post('/login', [UserController::class, 'authenticate']);
// log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashbord
    Route::get('/admin', [UserController::class, 'adminDashboard'])->middleware('auth')->name('admin.dashboard');
    // get all user
    Route::get('/users', [UserController::class, 'index'])->middleware('auth');
    // show lecturer register 
    Route::get('/users/create', [UserController::class, 'createLecturer']);
    // manage user
    Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');
    // show single user
    Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth');
    // show edit user form
    Route::get('/users/{user}/edit', [PersonalDetailController::class, 'edit'])->middleware('auth');
    // update user
    Route::put('/users/{user}', [PersonalDetailController::class, 'update'])->middleware('auth');
    // delete user
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');
    // show all students
    Route::get('/students', [StudentAdmissionController::class, 'index'])->middleware('auth');
    // show students dashboard
    Route::get('/student/dashboard', [StudentAdmissionController::class, 'dashboard'])->middleware('auth');
    // store student
    Route::post('/students', [StudentAdmissionController::class, 'store'])->middleware('auth');
    // show student create form
    Route::get('/students/create', [StudentAdmissionController::class, 'create'])->middleware('auth');
    // show student edit form
    Route::get('/students/{student}/edit', [StudentAdmissionController::class, 'edit']);
    // update student edit form
    Route::put('/students/{student}', [StudentAdmissionController::class, 'update']);
    // manage student
    Route::get('/students/manage', [StudentAdmissionController::class, 'manage']);
    // show single student
    Route::get('/students/{student}', [StudentAdmissionController::class, 'show'])->name('students.list');
    // show lecturer create form
    Route::get('/lecturers/create', [UserController::class, 'createLecturer'])->middleware('auth');
    // store lecturer create form
    Route::post('/lecturers', [UserController::class, 'storeLecturer'])->middleware('auth');
    // show create course form
    Route::get('/courses/create', [CourseController::class, 'create']);
    // store course form
    Route::post('/courses', [CourseController::class, 'store']);
    // show edit course form
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
    // update edit course form
    Route::put('/courses/{course}', [CourseController::class, 'update']);
    // destroy course
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
    // manage courses
    Route::get('/courses/manage', [CourseController::class, 'manage']);
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
    // show section create form
    Route::get('/sections/create', [SectionController::class, 'create']);
    // store section form
    Route::post('/sections', [SectionController::class, 'store']);
    // show edit section form
    Route::get('/sections/{section}/edit', [SectionController::class, 'edit']);
    // update section form
    Route::put('/sections/{section}', [SectionController::class, 'update']);
    // delete section
    Route::delete('/sections/{section}', [SectionController::class, 'destory']);
    // manage section
    Route::get('/sections/manage', [SectionController::class, 'manage']);
    // show faculty create form
    Route::get('/faculties/create', [FacultyController::class, 'create']);
    // store faculty form data
    Route::post('/faculties', [FacultyController::class, 'store']);
    // show faculty edit form
    Route::get('/faculties/{faculty}/edit', [FacultyController::class, 'edit']);
    // update faculty form data
    Route::put('/faculties/{faculty}', [FacultyController::class, 'update']);
    // delete faculty data
    Route::delete('/faculties/{faculty}', [FacultyController::class, 'destroy']);
    // manage faculty
    Route::get('/faculties/{faculty}', [FacultyController::class, 'manage']);
    // show department create form
    Route::get('/departments/create', [DepartmentController::class, 'create']);
    // store department form data
    Route::post('/departments', [DepartmentController::class, 'store']);
    // show departments edit form
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit']);
    // update departments form data
    Route::put('/departments/{department}', [DepartmentController::class, 'update']);
    // delete department data
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy']);
    // manage department
    Route::get('/departments/manage', [DepartmentController::class, 'manage']);
    // show level create form
    Route::get('/levels/create', [LevelController::class, 'create']);
    // store level form data
    Route::post('/levels', [LevelController::class, 'store']);
    // show level edit form
    Route::get('/levels/{level}/edit', [LevelController::class, 'edit']);
    // update departments form data
    Route::put('/levels/{level}', [LevelController::class, 'update']);
    // delete department data
    Route::delete('/levels/{level}', [LevelController::class, 'destroy']);
    // manage department
    Route::get('/levels/manage', [LevelController::class, 'manage']);
    // show create courses offer
    Route::get('/coursesoffer/create/{user}', [CourseOfferController::class, 'create']);
    // store course form
    Route::post('/coursesoffer/student', [CourseOfferController::class, 'store']);
    // show lecturer lecture form
    Route::get('/coursesoffer/lecturer/{user}', [CourseOfferController::class, 'LecturerCourse']);
    // store lecturer lecture form
    Route::post('/coursesoffer/lecturer', [CourseOfferController::class, 'StoreLectures']);
    // delete course Offer
    Route::delete('/coursesoffers/{courses_offer}', [CourseOfferController::class, 'destroy']);
});

Route::middleware(['auth', 'lecturer'])->group(function () {
    // show all lectures
    Route::get('/lectures', [CourseOfferController::class, 'index'])->middleware('auth');
    // show all lectures
    Route::get('/lectures/{lecture}', [CourseOfferController::class, 'show'])->middleware('auth');
    // show all students
    Route::get('/students', [StudentAdmissionController::class, 'index'])->middleware('auth');
    // show single student
    Route::get('/students/{student}', [StudentAdmissionController::class, 'show'])->name('students.list');
    // Lecturer dashboard
    Route::get('/lecturer', [UserController::class, 'lecturerDashboard'])->name('lecturer.dashboard');
    // store lecturer courses
    Route::post('/lecturers/courses', [Lecturer_coursesController::class, 'store']);
    // destroy lecturer courses
    Route::delete('/lecturers_courses/{lecturer_courses}', [Lecturer_coursesController::class, 'destroy']);
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
Route::middleware(['auth', 'student'])->group(function () {
    // Student dashbord
    Route::get('/', [UserController::class, 'dashboard'])->name('student.dashboard');
    // show single user
    Route::get('/users/{user}', [UserController::class, 'show']);
    // store student
    Route::post('/students', [StudentAdmissionController::class, 'store']);
    // show student create form
    Route::get('/students/create', [StudentAdmissionController::class, 'create']);
    // show student edit form
    Route::get('/students/{student}/edit', [StudentAdmissionController::class, 'edit']);
    // update student edit form
    Route::put('/students/{student}', [StudentAdmissionController::class, 'update']);
    // show single student
    Route::get('/students/{student}', [StudentAdmissionController::class, 'show'])->name('students.list');
    // store student courses
    Route::post('/students/courses', [Student_coursesController::class, 'store']);
    // destroy student courses
    Route::delete('/students_courses/{student_courses}', [Student_coursesController::class, 'destroy']);
    // show single attendance
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show']);
});


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show show form to edit listing
// update - Update listing
// destroy - Delete listing