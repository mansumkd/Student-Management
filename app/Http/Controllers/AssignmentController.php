<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Branch;
use App\Models\Subject;
use App\Models\SubmitAssignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function firstAssignmentPage()
    {
         $branches = Branch::get();
         $subjects = Subject::get();
        return view('staff.firstaddpage')->with(compact('branches','subjects'));
    }
    public function firstAssignmentPost(Request $request)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $subjects = Subject::where('semester',$semester)->where('branch',$branch)->get();
        return view('staff.add-assignment',['semester'=>$semester,'branch'=>$branch])->with(compact('subjects'));
    }


    public function store(Request $request)
    {
        $assignment= new Assignment();
        $assignment->semester = $request->input('semester');
        $assignment->branch = $request->input('branch');
        $assignment->subject = $request->input('subject');
        $assignment->question = $request->input('question');
        $validatedData = $request->validate(['file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc|max:2048']);
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files/');
        $assignment->name = $name;
        $assignment->path = $path;
        $assignment->date = $request->input('date');
        $success = $assignment->save();
        if($success)
        {
            $message = 'Upload Successfully';
            return redirect()->back()->with('message',$message);
            //return redirect()->intended('/add-assignmentfirst')->with(compact('message'));
        }
        else
        {
            return "error";
        }

    }

    public function showlist()
    {
        $assignments= Assignment::all();
        //dump( $assignments);
        return view('staff.listassignments')->with(compact('assignments'));

    }

    public function getDownload($id)
    {

        $file=Assignment::where('id',$id)->first();
        $path = $file->path;
        $filePath =storage_path('app/'.$path);
        return response()->download($filePath);

    }

    public function delete($id)
    {
        $suc =   Assignment::where('id',$id)->delete();
        if($suc)
        {
            return redirect()->intended('/listassignments');
        }
        else
        {
            dump("Error");
        }
    }

    public function listassignmentfirst()
    {
        $branches = Branch::get();
        return view('student.listassignmentfirst')->with(compact('branches'));

    }

    public function listassignmentpost(Request $request)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $assignments = Assignment::where('semester',$semester)->where('branch',$branch)->get();
        return view('student.list-assignment',['semester'=>$semester,'branch'=>$branch])->with(compact('assignments'));

    }

    public function listassignmentDownload($id)
    {
        $file=Assignment::where('id',$id)->first();
        $path = $file->path;
        $filePath =storage_path('app/'.$path);
        return response()->download($filePath);

    }

    public function listassignmentshow()
    {
        $branches = Branch::get();
        return view('parent.firstassignmentlist')->with(compact('branches'));
    }

    public function listassignmentshowPost(Request $request)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $assignments = Assignment::where('semester',$semester)->where('branch',$branch)->get();
        return view('parent.listassignment')->with(compact('assignments'));
    }

    public function listDownload($id)
    {
        $file=Assignment::where('id',$id)->first();
        $path = $file->path;
        $filePath =storage_path('app/'.$path);
        return response()->download($filePath);
    }

    public function submitStore(Request $request,$id)
    {
        $assignment = Assignment::where('id',$id)->first();
        //dump($assignment);
        $submitassignment= new SubmitAssignment();
        $submitassignment->semester = $assignment->semester;
        $submitassignment->branch = $assignment->branch;
        $submitassignment->subject =$assignment->subject;
        $submitassignment->question = $assignment->question;
        $request->validate(['file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048']);
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/SubmitAssignment/');
        $submitassignment->name = $name;
        $submitassignment->path = $path;
        $submitassignment->date = $assignment->date;
        $submitassignment->submitted_by = auth()->user()->regno;


        $success = $submitassignment->save();
        if($success)
        {
            $message = 'Upload Successfully';
            return redirect()->back()->with('message',$message);
            //return redirect()->intended('/listassignmentfirst')->with(compact('message'));
        }
        else
        {
            return "error";
        }

    }

    public function submitShow()
    {
         $branches = Branch::get();
         $subjects = Subject::get();
        return view('staff.list-submitassignmentfirst')->with(compact('branches','subjects'));
    }
    public function submitShowPost(Request $request)
    {
        $semester = $request->input('semester');
        $branch = $request->input('branch');
        $assignments = SubmitAssignment::where('semester',$semester)->where('branch',$branch)->get();
        return view('staff.list-submitassignment',['semester'=>$semester,'branch'=>$branch])->with(compact('assignments'));
    }

    public function getSubmit($id)
    {
        $file=SubmitAssignment::where('id',$id)->first();
        $path = $file->path;
        $filePath =public_path('app/'.$path);
        return response()->download($filePath);

    }
}
