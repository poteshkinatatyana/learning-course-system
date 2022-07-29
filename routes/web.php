<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get(view('/', function () {return view('welcome');}));

// Route::get('/{any}', )->where('any', '.*');

Auth::routes();
Route::get('/', function () {return view('welcome');})->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/course/{id_course}', [App\Http\Controllers\CourseController::class, 'getCourseSingle']);
Route::get('/create_course', [App\Http\Controllers\CourseController::class, 'createCourse'])->name('createCourse');
Route::get('/edit_course/{user_id}/{course_id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('editCourse');


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
    Route::get('/users', [App\Http\Controllers\Admin\HomeController::class, 'users'])->name('users_list');
    Route::get('/categories', [App\Http\Controllers\Admin\HomeController::class, 'categories'])->name('cats_list');
    Route::post('/create_user', [App\Http\Controllers\Admin\HomeController::class, 'create_user'])->name('create_user');
    Route::post('/create_category', [App\Http\Controllers\Admin\HomeController::class, 'create_category'])->name('create_category');
    Route::delete('/delete_user/{user_id}/', [App\Http\Controllers\Admin\HomeController::class, 'destroy'])->name('delete_user');
    Route::delete('/delete_category/{cat_id}/', [App\Http\Controllers\Admin\HomeController::class, 'destroy_cat'])->name('destroy_cat');
    Route::post('/editcategory/{category_id}',[App\Http\Controllers\Admin\HomeController::class, 'editcategory'])->name('editcategory');
    Route::post('/edituser/{user_id}',[App\Http\Controllers\Admin\HomeController::class, 'edituser'])->name('edituser');


});

Route::post('/search', [App\Http\Controllers\CourseController::class, 'filtration'])->name('filtration');
