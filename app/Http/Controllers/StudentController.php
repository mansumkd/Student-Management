<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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
            $path = $request->file('file')->store('public/Resume');
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

    public function showMarkfirst(Request $request)
    {
        $branch = $request->query('branch');
        $id = $request->query('id');
        return view('student.qr-showMarkFirst',['branch'=>$branch,'id'=>$id]);
    }

    public function showMarkpost(Request $request,$id)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $subjects = Subject::where('semester',$semester)->where('branch',$branch)->get();
        $student = User::where('id',$id)->first();
        $regno = $student->regno;
        $marks=Mark::where('semester',$semester)->where('branch',$branch)->where('regno', $regno)->get();
        return view('student.qr-showMark',['semester'=>$semester,'branch'=>$branch,'student'=>$student])->with(compact('subjects','marks'));
    }


             // list marks to students and parents

    public function listmarksget()
    {
        $branches = Branch::get();
         return view('student.listmarkfirst')->with(compact('branches'));
    }

    public function listmarksstore(Request $request)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $rnum=auth()->user()->regno;
        $role =auth()->user()->role;
        $subjects = Subject::where('semester',$semester)->where('branch',$branch)->get();
        $marks = Mark::where('semester',$semester)->where('branch',$branch)->where('regno',$rnum)->get();
        if($role == 'student' || $role == 'parent'){
        return view('student.listmarks',['semester'=>$semester,'branch'=>$branch])->with(compact('subjects','marks'));
        }
        else {
            return redirect()->back();
        }
    }

     // list attendance to students and parents

     public function listattendanceGet()
     {
         $branches = Branch::get();
          return view('student.listattendancefirst')->with(compact('branches'));
     }
     public function listattendanceStore(Request $request)
     {
         $semester = $request->input('semester');
         $branch = $request->input('branch');
         $rnum=auth()->user()->regno;
         $role =auth()->user()->role;

         $attendances = Attendance::where('semester',$semester)->where('branch',$branch)->where('regno',$rnum)->get();
         if($role == 'student' || $role == 'parent'){
         return view('student.listattendance',['semester'=>$semester,'branch'=>$branch])->with(compact('attendances'));
         }
         else {
             return redirect()->back();
         }
     }

}




