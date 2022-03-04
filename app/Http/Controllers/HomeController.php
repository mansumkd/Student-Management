<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    
     public function index(){
        if(auth()->user()->role === 'admin'){
            return view('admin.index');
        }else if(auth()->user()->role === 'student'){
            return view('student.index');
        }
        else if(auth()->user()->role === 'staff'){
            return view('staff.index');
        }
        else if(auth()->user()->role === 'parent'){
            return view('parent.index');
        }
        else if(!auth()->user()){
            return redirect()->intended('/login');
        }
     }
    



    

    
}
