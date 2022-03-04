<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students = User::where('role','student')->get();

     return view('admin.students')->with('students',$students);

    }
}
