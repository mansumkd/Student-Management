<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Branch;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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
}
