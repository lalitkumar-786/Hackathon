<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\projects;
use Illuminate\Support\Facades\DB;
class user_controller extends Controller
{
    public function store_projects(Request $request){
    	$user=new projects;
    	$user->id="13";
    	$user->owner="asa";
//    	echo Input::get('project_title');
    	$user->title=Input::get('project_title');
    	$user->description=Input::get('description');
    	$user->requirements=Input::get('requirements');
    	$user->save();

      $error ='Project Saved';
      return redirect()->back()->withErrors(array('f' => $error));

    }

    public function view_projects(Request $request){
    	$post = $request->all();

    	$user=new projects;
    	$user->title = $post['project_title'];
    	$user->requirements= $post['requirement'];
    	$x = explode(',',$user->requirements);

    	$query="Select * from projects WHERE projects.title LIKE '%$user->title%' " ;
    	$array = array($user->title);
    	foreach($x as $row){
    		$query=$query."OR projects.requirements LIKE '%$row%' ";
    		array_push($array, $row);
    	}
    	//echo $query."<br>";
    	//print_r($array);

    	$res = \DB::select(DB::raw($query));

    	if(count($res)==0)
    	{
        $error ='No results found';
        return redirect()->back()->withErrors(array('f' => $error));
    	}
    	else
    	{
    		return view('/view_projects',compact('res'));
    	}
    }
}
