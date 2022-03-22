<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Branch;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
  public function index()
  {

    $staffs = User::where('role', 'staff')->get();
    return view('admin.staffs')->with(compact('staffs'));
  }
  public function marksUpdatePagelevelOne()
  {
    $branches = Branch::all();
    return view('staff.updatemarkslevelone')->with(compact('branches'));
  }
  public function marksUpdatePagelevelTwo(Request $request)
  {

    $semester = $request->input('semester');
    $branch = $request->input('branch');
    $subjects = Subject::where('semester', $semester)->where('branch', $branch)->get();
    $exams = Exam::where('semester', $semester)->where('branch', $branch)->get();

    return view('staff.updatemarksleveltwo', ['branch' => $branch, 'semester' => $semester])->with(compact('subjects', 'exams'));
  }
  public function updateMarksfinal(Request $request)
  {
    $data = $request->all();
    $mark = new Mark();
    $mark->semester = $data['semester'];
    $mark->branch = $data['branch'];
    $mark->regno = $data['regno'];
    $mark->exam = $data['exam'];
    $mark->mark1 = $data['mark1'];
    $mark->mark2 = $data['mark2'];
    $mark->mark3 = $data['mark3'];
    $mark->mark4 = $data['mark4'];
    $mark->mark5 = $data['mark5'];
    $mark->mark6 = $data['mark6'];


    $success = $mark->save();
    if ($success) {
      return redirect()->intended('/update-marks-level-one')->with(['message'=>'mark uploaded successfully']);
    } else {
      dump('Error');
    }
  }

  public function show($id)
  {
    $staff = User::findOrFail($id);
    return view('admin.staffedit')->with(compact('staff'));
  }

  public function update(Request $request, $id)
  {
    $staff = User::findOrFail($id);
    $staff->name = $request->input('name');
    $staff->regno = $request->input('regno');
    $staff->branch = $request->input('branch');
    $staff->email = $request->input('email');
    $staff->phone = $request->input('phone');
    $update = $staff->update();

    if ($update) {
      return redirect()->intended('/staffs-list')->with(compact('update'));
    } else {
      dump("Error");
    }
  }

  public function delete($id)
  {
    $suc =   User::where('id', $id)->delete();
    if ($suc) {
      return redirect()->intended('/staffs-list');
    } else {
      dump("Error");
    }
  }

  public function studentindex()
  {
    $students = User::where('role', 'student')->get();
    return view('staff.liststudents')->with(compact('students'));
  }


  public function attendanceGet()
    {
        $branches = Branch::get();
        //$subjects = Subject::get();
        return view('staff.firstattendance')->with(compact('branches'));
    }

    public function attendancePost(Request $request){
        $semester = $request->input('semester');
        $branch = $request->input('branch');

        $registers = Mark::where('semester', $semester)->where('branch', $branch)->get();
        return view('staff.secondattendance',['semester'=>$semester,'branch'=> $branch])->with(compact('registers'));
    }

    public function storeattendance(Request $request)
    {
        $attendance = new Attendance();
        $attendance->semester = $request->input('semester');
        $attendance->branch = $request->input('branch');
        $attendance->date = $request->input('date');
        $attendance->regno = $request->input('regno');
        $attendance->status = $request->input('status');

        $success = $attendance->save();
        if($success)
        {
            $message = 'successfully updated';
            return redirect()->intended('firstassignmentlist')->with(compact('message'));
        }

        else
        {
            return "error";
        }
    }

}
