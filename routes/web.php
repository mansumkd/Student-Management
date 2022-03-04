<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;


use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->middleware('isAdmin','isStaff','isStudent','isParent');


Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Admin Routes here
Route::get('/register-user',[CreateUserController::class,'index'])->name('register-user')->middleware('isAdmin');
Route::post('/register-user',[CreateUserController::class,'createUser'])->name('register-user')->middleware('isAdmin');
Route::get('/add-notifications',[NotificationController::class,'addPage'])->name('add-notifications')->middleware('isAdmin');
Route::post('/add-notifications',[NotificationController::class,'store'])->name('add-notifications')->middleware('isAdmin');
Route::get('add-exam',[ExamController::class,'addPage'])->name('add-exam')->middleware('isAdmin');
Route::post('add-exam',[ExamController::class,'store'])->name('add-exam')->middleware('isAdmin');

//Student Routes here
Route::get('/students-list',[StudentController::class,'index'])->name('students-list')->middleware('isAdmin');
Route::get('/notifications',[NotificationController::class,'index'])->name('notifications');


//Staff Routes here
Route::get('/staffs-list',[StaffController::class,'index'])->name('staffs-list')->middleware('isAdmin');
Route::delete('/staffs-list/delete/{id}',[StaffController::class,'delete'])->name('staffs-list/delete/{id}')->middleware('isAdmin');
Route::get('/update-marks',[StaffController::class,'marksUpdatePage'])->name('update-marks')->middleware('isStaff');

//parent Routes

Route::get('/parents-list',[ParentController::class,'index'])->name('parents-list')->middleware('isAdmin');