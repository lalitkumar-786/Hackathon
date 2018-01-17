<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Judge;
use App\upload_private;
use App\upload_public;
class compilerController extends Controller
{
    public function compile()
    	{
    		$problem_code = -1;
    		if($problem_code!=-1){
    			$dir = '../storage/app/users/2014159';
    			$dir2 = '/users/2014159/';
    		}
    		else{
    			$dir = '../storage/app/public';
    			$dir2 = '/public/';
    		}
     		$CODE = new Judge;
     		$CODE->verdict = "Skipped";
     		$CODE->save();

     		/**************COLLECTING FORM INPUTS*********************/

    		$code = $_POST['code'];
			$input = $_POST['input'];
			$lang = $_POST['langs'];

			/**************GENERATING FILE NAMES AS PER ID************/

			$input_file  = $CODE->submission_id.'.ip.txt';
			$output_file = $CODE->submission_id.'.op.txt';
			$error_file  = $CODE->submission_id.'.er.txt';
			Storage::put($dir2.$input_file,$input);

			/***********COMPILING AS PER LANGUAGE IN INPUT************/

			if ($lang == "gcc")
				{
					$code_file = $CODE->submission_id.'.cpp';
					$exec_file = $CODE->submission_id.'.out';
					Storage::put($dir2.$code_file,$code);
			        $process = new process('cd '.$dir.' && g++ -o '.$exec_file.' '.$code_file.' 2> '.$output_file.';echo $? >'.$error_file.'');
			        $process->run();
			        $status = Storage::get($dir2.$error_file); //status tells if it is succesfully compiled or not
			        /**********************************/

			        // if(filesize('outputs.txt')>0)

			        if ($status != 0)
			            {
				            $x = Storage::get($dir2.$output_file);
				            echo $x;
			            }

			        if ($status == 0)
			            {
				            exec('cd '.$dir.' && timeout 1 ./'.$exec_file.' <'.$input_file.' >'.$output_file.';echo $? >'.$error_file.'', $op);
				            $x = Storage::get($dir2.$error_file);
			                if ($x == 0){
			                	$x = Storage::get($dir2.$output_file);
			                	$CODE->verdict = "AC";
			                }
			                else if ($x == 124){
			                	$x = "Time Limit Exceeded";
			                	$CODE->verdict = "TLE";
			                }

			                else{
			                	$x = "Runtime Error";
			                	$CODE->verdict = "RE";
			                }
			                echo $x;
			            }
			       	if (Storage::exists($dir2.$input_file)) Storage::delete($dir2.$input_file);
			        if (Storage::exists($dir2.$output_file)) Storage::delete($dir2.$output_file);
			        if (Storage::exists($dir2.$error_file)) Storage::delete($dir2.$error_file);
			        if (Storage::exists($dir2.$code_file)) Storage::delete($dir2.$code_file);
			        if (Storage::exists($dir2.$exec_file)) Storage::delete($dir2.$exec_file);
				}
			else if ($lang == "java")
				{
					$exec_file = "Main.class";
					$code_file = $CODE->submission_id.'.java';
			        Storage::put($dir2.$code_file,$code);
			        exec('cd '.$dir.' && javac '.$code_file.' 2> '.$output_file.';echo $? >'.$error_file.'', $ops);
			        $status = Storage::get($dir2.$error_file); //status tells if it is succesfully compiled or not
			        /**********************************/

			        // if(filesize('outputs.txt')>0)

			        if ($status != 0)
			            {
			                $x = Storage::get($dir2.$output_file);
			                echo $x;
			            }

			        if ($status == 0)
			            {
			                exec('cd '.$dir.' && timeout 2 java Main <'.$input_file.' >'.$output_file.';echo $? >'.$error_file.'', $op);
			                $x = Storage::get($dir2.$error_file);
			                if ($x == 0){
			                	$x = Storage::get($dir2.$output_file);
			                	$CODE->verdict = "AC";
			                }
			                else if ($x == 124){
			                	$x = "Time Limit Exceeded";
			                	$CODE->verdict = "TLE";
			                }

			                else{
			                	$x = "Runtime Error";
			                	$CODE->verdict = "RE";
			                }
			                echo $x;
			            }

			        if (Storage::exists($dir2.$input_file)) Storage::delete($dir2.$input_file);
			        if (Storage::exists($dir2.$output_file)) Storage::delete($dir2.$output_file);
			        if (Storage::exists($dir2.$error_file)) Storage::delete($dir2.$error_file);
			        if (Storage::exists($dir2.$code_file)) Storage::delete($dir2.$code_file);
			        if (Storage::exists($dir2.$exec_file)) Storage::delete($dir2.$exec_file);
				}
			if ($lang == "python")
				{
					$code_file = $CODE->submission_id.'.py';
					Storage::put($dir2.$code_file,$code);
			        exec('cd '.$dir.' && timeout 2 python '.$code_file.' <'.$input_file.' 2>'.$output_file.';echo $? >'.$error_file.'', $op);
			        $status = Storage::get($dir2.$error_file); //status tells if it is succesfully compiled or not
			        /**********************************/

			        // if(filesize('outputs.txt')>0)

			        if ($status != 0)
			            {
			            	$CODE->verdict = "CE";
			                $x = Storage::get($dir2.$output_file);
			                echo $x;
			            }

			        if ($status == 0)
			            {
			                exec('cd '.$dir.' && timeout 2 python '.$code_file.' <'.$input_file.' >'.$output_file.';echo $? >'.$error_file.'', $op);
			                $x = Storage::get($dir2.$output_file);
			                echo $x;
			            }
			        if (Storage::exists($dir2.$input_file)) Storage::delete($dir2.$input_file);
			        if (Storage::exists($dir2.$output_file)) Storage::delete($dir2.$output_file);
			        if (Storage::exists($dir2.$error_file)) Storage::delete($dir2.$error_file);
			        if (Storage::exists($dir2.$code_file)) Storage::delete($dir2.$code_file);
				}
			$CODE->save();
    	}
    public function fileUpload(Request $request){
        $file = request()->file('image');
        $value = 'test@iiitdmj.ac.in';//$_SESSION['username'];
        $val = $request->submit;
        if($val==0){
            $path = $file->store($value."/public");
            $upload = new upload_public;
            $upload->username = $value;//$_SESSION['username'];
            $upload->title = $request->title;
            $upload->filename = $path;
             $upload->save();
        }
        else if($val==1){

            $path = $file->store($value."/private");
            $upload = new upload_private;
            $upload->username = $value;
            $upload->title = $request->title;
            $upload->filename = $path;
             $upload->save();
        }

        return back();

   }

    public function view_public(){
        $username = 'test@iiitdmj.ac.in';//$_SESSION['username'];
        $pub_files = \DB::table('upload_public')->where('username',$username)->get();
        return view('view_public',compact('pub_files'));
    }
    public function view_private(){
        $username = 'test@iiitdmj.ac.in';//$_SESSION['username'];

        $pri_files = \DB::table('upload_private')->where('username',$username)->get();
        return view('view_private',compact('pri_files'));
    }
 public function getDownload(Request $request)
{
    //dd($request->filename);
    $file= storage_path().'/app/'.$request->filename;
    return response()->download($file);
}
}
