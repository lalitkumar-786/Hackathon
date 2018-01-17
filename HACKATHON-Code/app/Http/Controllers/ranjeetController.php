<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\login;
use Illuminate\Support\Facades\Input;
session_start();

class ranjeetController extends Controller
{
    public function register(Request $request)
    {
      $user=new login;
      $user->email=Input::get('email');
      $user->firstname=Input::get('firstname');
      $user->lastname=Input::get('lastname');
      $user->password=Input::get('password');
      $user->save();
      $error ='SuccessFully Registed';
      return redirect()->back()->withErrors(array('f' => $error));
    }

    public function login(Request $request)
    {
      $user=new login;
      $username=Input::get('email');
      $password=Input::get('password');

      $check = \DB::table('login')->where('email',$username)->where('password',$password)->get();

      if(count($check)==0)
      {
        $error ='Either wrong username or password';
        return redirect()->back()->withErrors(array('f' => $error));
      }
      else
      {
        $_SESSION['username']=$check[0]->email;
        $_SESSION['firstname']=$check[0]->firstname;
        $_SESSION['lastname']=$check[0]->lastname;

        return redirect('main')->withErrors(array('f' =>$check[0]->firstname));
      }
    }

    public function logout()
    {
      session_destroy();
      return redirect('/');
    }
}
