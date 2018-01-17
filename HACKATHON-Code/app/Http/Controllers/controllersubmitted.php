<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\shared_documents;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

session_start();

class controllersubmitted extends Controller
{
    public function submitted(Request $request)
    {
        $post = $request->all();
        $user = new shared_documents;
        $user->username = $_SESSION['username'];
        
        //file upload to be implemented here
        $file = request()->file('file');

        $user->file_url = $file->store('shared_documents/');
        $user->type=$file->getMimeType();
        
        $user->course_code=$post["course_code"];
        $user->description=$post["description"];
        $user->save();
        return view('submitted');
    }
    public function subject_show(Request $request)
    {
      $get=$request->all();
      $subject[0]=$get['subject'];
      return view('subject_show',compact('subject'));

    }
    public function tutorial_show(Request $request)
    {
      $get=$request->all();
      $subject[0]=$get['subject'];
      return view('tutorial_show',compact('subject'));

    }
    public function question_show(Request $request)
    {
      $get=$request->all();
      $subject[0]=$get['subject'];
      return view('question_show',compact('subject'));

    }

    public function download(Request $request){
      $file = storage_path().'/app/'.$request->filename;
      return response()->download($file);

    }
}
