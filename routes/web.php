<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;

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
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('root');
Route::resource('login', AuthController::class)->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('role', RoleController::class);
    Route::get('institution', [InstitutionController::class,'index'])->name('institution.index');
    Route::resource('staff',StaffController::class);
    Route::resource('course',CourseController::class);
    Route::post('/courses',[CourseController::class,'courses'])->name('courses');
    Route::resource('batch',BatchController::class);
    Route::resource('student',StudentController::class);
    Route::get('allocate_batch/{id}',[StudentController::class,'allocate'])->name('student.allocate');
    Route::post('allocate_batch',[StudentController::class,'batched'])->name('student.batched');
    Route::post('find-batch',[StudentController::class,'findBatch'])->name('student.findBatch');
    Route::get('log-out',[AuthController::class,'logout'])->name('logout');

    Route::resource('department',DepartmentController::class);
    Route::post('/departments',[DepartmentController::class,'departments'])->name('departments');

    
});    
