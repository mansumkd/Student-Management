<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}

