<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index']);
Route::get('/course/{id_course}', [App\Http\Controllers\CourseController::class, 'getCourse']);

Route::get('/all_courses', [App\Http\Controllers\CourseController::class, 'indexall']);
Route::middleware('auth_token')->post('/course_create', [App\Http\Controllers\CourseController::class, 'create']);
Route::middleware('auth_token')->post('/course_update/{id}', [App\Http\Controllers\CourseController::class,  'update']);
Route::middleware('auth_token')->delete('/course_delete/{id}', [App\Http\Controllers\CourseController::class,  'destroy']);
Route::get('/category/{id}', [App\Http\Controllers\CourseController::class,  'getCourseByCategory'])->name('getCourseByCategory');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);
Route::middleware('auth_token')->post('/category_create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::middleware('auth_token')->post('/category_update/{id}', [App\Http\Controllers\CategoryController::class,  'update']);
Route::middleware('auth_token')->delete('/category_delete/{id}', [App\Http\Controllers\CategoryController::class,  'destroy']);

Route::middleware('auth_token')->get('/user/{user_id}', [App\Http\Controllers\TeacherController::class,  'getUserData']);


Route::get('/users', [App\Http\Controllers\TeacherController::class,  'index']);
Route::post('/register_user', [App\Http\Controllers\TeacherController::class,  'create']);
Route::post('/auth_user', [App\Http\Controllers\TeacherController::class,  'login']);
