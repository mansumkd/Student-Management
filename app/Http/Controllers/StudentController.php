<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Resume;
use App\Models\Subject;
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

    public function getQR()
    {
       $id = auth()->user()->id;
        $url=url('/qrform/'.$id);
        return view('student.qrCode')->with(compact('url'));

    }

    public function qrform($id)
    {
        $student = User::findOrFail($id);
        $regno= $student->regno;
        $parent = User::where('role','parent')->where('regno',$regno)->first();
        return view('student.qrForm',['student' => $student, 'parent'=>$parent]);
    }

    public function resumeDownload($id)
    {
        $file=Resume::where('studentId',$id)->first();
        $path = $file->path;
        $filePath =storage_path('app/'.$path);
        return response()->download($filePath);
    }

    public function showMarkfirst()
    {
        $branches = Branch::all();
        return view('student.qr-showMarkFirst')->with(compact('branches'));
    }

    public function showMarkpost(Request $request)
    {
        $semester = $request->input('semester');
        $branches = $request->input('branch');
        $subjects = Subject::where('semester',$semester)->where('branch',$branches)->get();
        $register=auth()->user()->regno;
        $marks=Mark::where('semester',$semester)->where('branch',$branches)->where('regno', $register)->get();
        return view('student.qr-showMark',['semester'=>$semester,'branch'=>$branches])->with(compact('subjects','marks'));
    }

}




