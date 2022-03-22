<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignmentController;


use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\NotificationController;

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


Route::get('/add-subjects',[CreateUserController::class,'addSubjectget'])->name('add-subjects')->middleware('isAdmin');
Route::post('/add-subjects',[CreateUserController::class,'addSubjectPost'])->name('add-subjects')->middleware('isAdmin');

//Student Routes here
Route::get('/students-list',[StudentController::class,'index'])->name('students-list')->middleware('isAdmin');
Route::get('/students-list/edit/{id}',[StudentController::class,'show'])->name('students-list/edit/{id}')->middleware('isAdmin');
Route::post('/students-list/edit/{id}',[StudentController::class,'update'])->name('students-list/edit/{id}')->middleware('isAdmin');
Route::delete('/students-list/delete/{id}',[StudentController::class,'delete'])->name('students-list/delete/{id}')->middleware('isAdmin');
Route::get('/notifications',[NotificationController::class,'index'])->name('notifications');

Route::get('/listassignmentfirst',[AssignmentController::class,'listassignmentfirst'])->name('listassignmentfirst')->middleware('isStudent');
Route::post('/listassignmentfirst',[AssignmentController::class,'listassignmentpost'])->name('listassignmentfirst')->middleware('isStudent');
Route::get('/list-assignment/{id}',[AssignmentController::class,'listassignmentDownload'])->name('/list-assignment{id}')->middleware('isStudent');
Route::post('/store-assignment/{id}',[AssignmentController::class,'submitStore'])->name('store-assignment/{id}')->middleware('isStudent');

Route::get('/upload-resume',[StudentController::class,'resumeUploadPage'])->name('upload-resume')->middleware('isStudent');
Route::post('/upload-resume',[StudentController::class,'resumeUploadPost'])->name('upload-resume')->middleware('isStudent');


//Staff Routes here
Route::get('/staffs-list',[StaffController::class,'index'])->name('staffs-list')->middleware('isAdmin');
Route::get('/staffs-list/edit/{id}',[StaffController::class,'show'])->name('staffs-list/edit/{id}')->middleware('isAdmin');
Route::post('/staffs-list/edit/{id}',[StaffController::class,'update'])->name('staffs-list/edit/{id}')->middleware('isAdmin');
Route::delete('/staffs-list/delete/{id}',[StaffController::class,'delete'])->name('staffs-list/delete/{id}')->middleware('isAdmin');
Route::get('/update-marks-level-one',[StaffController::class,'marksUpdatePageLevelOne'])->name('update-marks-level-one')->middleware('isStaff');
Route::post('/update-marks-level-one',[StaffController::class,'marksUpdatePageLevelTwo'])->name('update-marks-level-one')->middleware('isStaff');
Route::post('/update-marks',[StaffController::class,'updateMarksFinal'])->name('update-marks')->middleware('isStaff');

Route::get('/add-assignmentfirst',[AssignmentController::class,'firstAssignmentPage'])->name('add-assignmentfirst')->middleware('isStaff');
Route::post('/add-assignmentfirst',[AssignmentController::class,'firstAssignmentPost'])->name('add-assignmentfirst')->middleware('isStaff');
Route::post('/add-assignment',[AssignmentController::class,'store'])->name('add-assignment')->middleware('isStaff');
Route::get('/listassignments',[AssignmentController::class,'showlist'])->name('listassignments')->middleware('isStaff');
Route::delete('/listassignments/delete/{id}',[AssignmentController::class,'delete'])->name('listassignments/delete/{id}')->middleware('isStaff');
Route::get('/listassignments/{id}',[AssignmentController::class,'getDownload'])->name('/listassignments{id}')->middleware('isStaff');
Route::get('/list-submitassignmentfirst',[AssignmentController::class,'submitShow'])->name('list-submitassignmentfirst')->middleware('isStaff');
Route::post('/list-submitassignmentfirst',[AssignmentController::class,'submitShowPost'])->name('list-submitassignmentfirst')->middleware('isStaff');
Route::get('/list-submitassignment/{id}',[AssignmentController::class,'getSubmit'])->name('/list-submitassignment{id}')->middleware('isStaff');

//parent Routes
Route::get('/parents-list',[ParentController::class,'index'])->name('parents-list')->middleware('isAdmin');

Route::get('/parents-list/edit/{id}',[ParentController::class,'show'])->name('parents-list/edit/{id}')->middleware('isAdmin');
Route::post('/parents-list/edit/{id}',[ParentController::class,'update'])->name('parents-list/edit/{id}')->middleware('isAdmin');
Route::delete('/parents-list/delete/{id}',[ParentController::class,'delete'])->name('parents-list/delete/{id}')->middleware('isAdmin');


Route::get('/firstassignmentlist',[AssignmentController::class,'listassignmentshow'])->name('firstassignmentlist')->middleware('isParent');
Route::post('/firstassignmentlist',[AssignmentController::class,'listassignmentshowPost'])->name('firstassignmentlist')->middleware('isParent');
Route::get('/listassignment/{id}',[AssignmentController::class,'listDownload'])->name('/listassignment{id}')->middleware('isParent');

//QR code

Route::get('/generate-qr',[StudentController::class,'getQR'])->name('generate-qr')->middleware('isStudent');

Route::get('/qrform/{id}',[StudentController::class,'qrform'])->name('qrForm');

Route::get('/resume-download/{id}',[StudentController::class,'resumeDownload'])->name('/resume-download/{id}');

Route::get('/show-markfirst',[StudentController::class,'showMarkfirst'])->name('/show-markfirst');
Route::post('/show-markfirst{id}',[StudentController::class,'showMarkpost'])->name('/show-markfirst/{id}');
Route::get('/show-mark',[StudentController::class,'showMark'])->name('/show-mark');



