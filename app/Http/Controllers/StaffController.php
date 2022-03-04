<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
  public function index(){
      
    $staffs = User::where('role','staff')->get();
      return view('admin.staffs')->with(compact('staffs'));
  }
 public function marksUpdatePage(){
   return view('staff.updatemarks');
 }

  public function delete($id){
    $suc =   User::where('id',$id)->delete();
    if($suc){
      return redirect()->intended('/staffs-list');
    }
    else{ 
      dump("Error");
    }
  }
}
