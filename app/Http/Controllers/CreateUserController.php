<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Subset;

class CreateUserController extends Controller
{

    public function index(){
        $branchs = Branch::get();
        return view('admin.register')->with(compact('branchs'));
    }

    public function createUser(Request $request){

       $user = new User();
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->password = Hash::make($request->input('password'));
       $user->role = $request->input('role');
       $user->phone = $request->input('phone');
       $user->regno = $request->input('regno');
       $user->branch =$request->input('branch');

       $success = $user->save();
       if($success){
           $message = 'Succesffully Created..';
           return redirect()->back()->with('message',$message);
       }


    }


    public function addSubjectget()
    {
        $branchs = Branch::get();
        return view('admin.add-subjects')->with(compact('branchs'));
    }

    public function addSubjectPost(Request $request)
    {
       $subject = new Subject();
       $subject->semester = $request->input('semester');
       $subject->branch =$request->input('branch');
       $subject->name = $request->input('subject');
       $success = $subject->save();
       if($success)
       {
           $message = 'Succesffully Created..';
           return redirect()->back()->with('message',$message);
       }
    }




}

