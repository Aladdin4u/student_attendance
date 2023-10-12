<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
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
Route::get('/students/manage/{student}', [StudentController::class, 'manage']);
// show single student
Route::get('/students/{student}', [StudentController::class, 'show']);
// store course create form
Route::post('/courses', [CourseController::class, 'store']);
// edit course form
Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
// update course edit form
Route::put('/courses/{course}', [CourseController::class, 'update']);
// destroy course
Route::delete('/courses/{course}', [CourseController::class, 'destroy']);

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show show form to edit listing
// update - Update listing
// destroy - Delete listing