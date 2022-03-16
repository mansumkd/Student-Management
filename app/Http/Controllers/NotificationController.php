<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
   public function index(){
       $notifications = Notification::all();
       if(auth()->user()->role === 'student'){
       return view('student.notification')->with(compact('notifications'));
       }
       else if(auth()->user()->role === 'admin'){
        return view('admin.notification')->with(compact('notifications'));
       }
       else if(auth()->user()->role === 'parent'){
        return view('parent.notification')->with(compact('notifications'));
       }
   }

   public function addPage(){
       return view('admin.add-notifications');
   }
   public function store(Request $request){
        
       $notification = new Notification();

       $notification->title = $request->input('title');
       $notification->description = $request->input('description');
       $notification->link = $request->input('link');

       $success = $notification->save();

       if($success){
           $message = "successfully updated";
           return redirect()->back()->with('message',$message);
          
       }
  

   }
}
