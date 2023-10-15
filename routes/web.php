<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessionController;
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

Route::get('/', function(){
    return view("welcome");
});
// show user create form
Route::get('/register', [UserController::class, 'create']);
// store user
Route::post('/register', [UserController::class, 'store']);
// show user login form
Route::get('/login', [UserController::class, 'login'])->name('login');
// login user
Route::post('/login', [UserController::class, 'authenticate']);
// log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// show all students
Route::get('/students', [StudentController::class, 'index']);
// store student
Route::post('/students', [StudentController::class, 'store']);
// show student create form
Route::get('/students/create', [StudentController::class, 'create']);
// show student edit form
Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
// update student edit form
Route::put('/students/{student}', [StudentController::class, 'update']);
// destroy student
Route::delete('/students/{student}', [StudentController::class, 'destroy']);
// manage student
Route::get('/students/manage', [StudentController::class, 'manage']);
// show single student
Route::get('/students/{student}', [StudentController::class, 'show']);
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
// manage student
Route::get('/courses/manage', [CourseController::class, 'manage']);
// show single course
Route::get('/courses/{course}', [CourseController::class, 'show']);
// show all lessions
Route::get('/lessions', [LessionController::class, 'index']);
// show lession create form
Route::get('/lessions/create', [LessionController::class, 'create']);
// store lession create form
Route::post('/lessions', [LessionController::class, 'store']);
// destroy lession
Route::delete('/lessions/{lession}', [LessionController::class, 'destroy'])->middleware('auth');
// show single lession
Route::get('/lessions/{lession}', [LessionController::class, 'show']);
// show attendance create form
Route::get('/attendances/create', [AttendanceController::class, 'create']);

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show show form to edit listing
// update - Update listing
// destroy - Delete listing