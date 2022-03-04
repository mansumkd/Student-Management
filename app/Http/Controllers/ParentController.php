<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
   public function index(){
       $parents = User::where('role','parent')->get();

       return view('admin.parents')->with(compact('parents'));

   }
}
