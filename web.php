<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Route::view('/', 'index')->middleware(['guest:teacher'])->name('login');


Route::prefix('/teacher')->group(function () {
    Route::get('/login', [TeacherController::class, 'login'])
        ->middleware('guest:teacher')
        ->name('teacher.login');

    Route::post('/login', [TeacherController::class, 'authenticate'])
        ->middleware('guest:teacher');

    Route::post('/logout', [TeacherController::class, 'logout'])
        ->middleware('auth:teacher')
        ->name('teacher.logout');

    Route::get('/dashboard', [TeacherController::class, 'index'])
        ->middleware('auth:teacher')
        ->name('teacher.index');
});
Route::prefix('/student')->group(function () {
    Route::get('/login', [StudentController::class, 'login'])
        ->middleware('guest:student')
        ->name('student.login');

    Route::post('/login', [StudentController::class, 'authenticate'])
        ->middleware('guest:student');

    Route::post('/logout', [StudentController::class, 'logout'])
        ->middleware('auth:student')
        ->name('student.logout');

    Route::get('/dashboard', [StudentController::class, 'index'])
        ->middleware('auth:student')
        ->name('student.index');
});
Route::prefix('/staff')->group(function () {
    Route::get('/login', [StaffController::class, 'login'])
        ->middleware('guest:staff')
        ->name('staff.login');

    Route::post('/login', [StaffController::class, 'authenticate'])
        ->middleware('guest:staff');

    Route::post('/logout', [StaffController::class, 'logout'])
        ->middleware('auth:staff')
        ->name('staff.logout');

    Route::get('/dashboard', [StaffController::class, 'index'])
        ->middleware('auth:staff')
        ->name('staff.index');
});
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])
        ->middleware('guest:admin')
        ->name('admin.login');

    Route::post('/login', [AdminController::class, 'authenticate'])
        ->middleware('guest:admin');

    Route::post('/logout', [AdminController::class, 'logout'])
        ->middleware('auth:admin')
        ->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->middleware('auth:admin')
        ->name('admin.index');
});
