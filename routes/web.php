<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InstitutionController;

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
});    
