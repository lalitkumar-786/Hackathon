<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\login;
use App\discussion_thread;
use App\discussion_replies;

session_start();
class Acontroller extends Controller
{

  public function add_topic(Request $request){
    $post = $request->all();
    $dis_thread = new discussion_thread;

  $dis_thread->username = $_SESSION['username'];
  $dis_thread->topic = $post['title'];
  $dis_thread->topic_description = $post['topic_desc'];
  $dis_thread->tags = $post['tags'];

  $dis_thread->save();

    return redirect('/view_discuss');
  }

  public function add_comment(Request $request){
    $post = $request->all();
    $dis_rep = new discussion_replies;
    $id = $post['id'];
    $dis_rep->id = $post['id'];
    $dis_rep->username = $_SESSION['username'];
    $dis_rep->message = $post['msg'];

    $dis_rep->save();

    return redirect('/view_topic/'.$id);
  }

  public function view_discuss(){
    $all = \DB::table('discussion_thread')->where('username',$_SESSION['username'])->get();

    return view('view_discussions',compact('all'));
  }

  public function view_topic($id){
    $res = \DB::table('discussion_thread')->find($id);
    $rep = \DB::table('discussion_replies')->where('id',$id)->get();
    return view('view_topic',compact('id','res','rep'));
  }
}
