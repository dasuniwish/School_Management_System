<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;




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

Route::get('/', function () {
    return redirect('/login');
});



Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'registerPost'])->name('register');

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'loginPost'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('teachers', TeachersController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('classes', ClassesController::class);
Route::get('classes/{id}/assign-subjects', [ClassesController::class, 'assignSubjects'])->name('classes.assignSubjects');
Route::post('classes/{id}/assign-subjects', [ClassesController::class, 'storeAssignedSubjects'])->name('classes.storeAssignedSubjects');
Route::resource('students', StudentsController::class);


  
