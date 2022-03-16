<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
   public function index(){
       $parents = User::where('role','parent')->get();

       return view('admin.parents')->with(compact('parents'));

   }

   public function show($id)
    {
        $parent= User::findOrFail($id);
        return view('admin.parentedit')->with(compact('parent'));
    }

    public function update(Request $request,$id)
    {
        $parent= User::findOrFail($id);
        $parent->name = $request->input('name');
        $parent->regno = $request->input('regno');
        $parent->branch =$request->input('branch');
        $parent->email = $request->input('email');
        $parent->phone = $request->input('phone');
        $update= $parent->update();

        if($update)
       {
        return redirect()->intended('/parents-list')->with(compact('update'));
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
            return redirect()->intended('/parents-list');
        }
        else
        {
            dump("Error");
        }
    }
}
