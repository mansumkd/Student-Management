<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class StudentController extends Controller
{
    public function index(){

        $students = User::where('role','student')->get();

     return view('admin.students')->with('students',$students);

    }

    public function show($id)
    {
        $student= User::findOrFail($id);
        return view('admin.studentedit')->with(compact('student'));

    }

    public function update(Request $request,$id)
    {
        $student= User::findOrFail($id);
        $student->name = $request->input('name');
        $student->regno = $request->input('regno');
        $student->branch =$request->input('branch');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $update= $student->update();

        if($update)
       {
        return redirect()->intended('/students-list')->with(compact('update'));
       }
       else
       {
           dump("Error");
       }
    }

    public function delete($id)
    {
        $suc =   User::where('id',$id)->delete();
        if($suc)
        {
          return redirect()->intended('/students-list');
        }
        else
        {
          dump("Error");
        }
    }

    public function resumeUploadPage()
    {
        return view('student.resume');
    }


    public function resumeUploadPost(Request $request)
    {

        $validatedData = $request->validate(['file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc|max:2048',]);

           $name = $request->file('file')->getClientOriginalName();

           $path = $request->file('file')->store('public/Resume/');

                $save = new Resume();
                $save->studentId = auth()->user()->id;
                $save->name = $name;
                $save->path = $path;
                $success = $save->save();
        if($success)
        {
            $message = 'successfully updated';
            return redirect()->back()->with('message',$message);
        }
        else
        {
            return "error";
        }
    }

    public function getQR(){
        $id = Auth::id();
        $student = User::findOrFail($id);
        return view('student.qrCode',['student' => $student]);

    }
}
