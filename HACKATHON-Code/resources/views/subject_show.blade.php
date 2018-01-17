<?php
$id=$subject[0];
$subject = \DB::table('shared_documents')->where('course_code',$id)->get();
$items=count($subject);
?>
@extends('master')

@section('title','subject_show')
@section('css')
<style>
body{
	background-image: url('/images/a.jpg');
	width: 100%;
	height: 100%;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>
@stop
@section('body')
<center>
<div class="container">
    <h3 align='center'>Source Drive</h3>
    <div class="row">
        <div class="col s3 offset-s0">
            <a href="subject"><button class="btn">SUBJECTS</button></a>
        </div>
        <div class="col s3 ">
            <a href="questionpaper"><button class="btn">SOLVED PAPERS</button></a>
        </div>
        <div class="col s3 ">
            <a href="tutorial"><button class="btn">TUTORIALS</button></a>
        </div>
        <div class="col s3 ">
            <a href="books"><button class="btn">BOOKS</button></a>
        </div>
    </div>
    </div>
</center>
<center>
    
    <br><br><br><br>
<div class="container">
        <div class="panel panel-default">
                <div class="panel-heading"><h4 align="center"><b>Your Results:</b></h4>

                </div>
            <table>
                @if($items)

                        <tr >
                        <th >Name</th>
                        <th>Link</th>
                        <th>Type</th>

                        </tr>

                    @foreach ($subject as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>
                                <form method="post" action="/download">
                                    {{csrf_field()}}<button type="submit" name="filename" value="{{$user->file_url}}" class="btn waves-effect">Download</button>
                                </form>
                            </td>
                            <td><b>{{$user->type}}</b></td>
                        </tr>
                    @endforeach

                @elseif($items==0)
                <h5 align='center' ><i class="green-text">Sorry, no notes are available....</i></h5>
                @endif


    </table>
</div>
    </div>

</center>
@stop
