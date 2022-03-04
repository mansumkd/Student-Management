<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function addPage(){
        $branchs = Branch::get();
        return view('admin.add-exam')->with(compact('branchs'));

    }

    public function store(Request $request)
    {
        $exam = new Exam();
        $exam->exam_code = $request->input('exam_code');
        $exam->exam_date = $request->input('exam_date');
        $exam->exam = $request->input('exam');
        $exam->branch = $request->input('branch');
        $exam->semester = $request->input('semester');
        $success = $exam->save();
        if($success){
            $message = 'successfully updated..';
          return redirect()->back()->with('message',$message);
        }
    }
}
