@extends('master')

@section('title','questionpaper')
@section('css')
<style>
body{
	background-image: url('images/a.jpg');
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
  <div class="container">
       <br><br><br><br><br>
      <h4><i>Search question paper according to course code..</i></h4>
      <br><br><br>
      <div class="row">
      <form  action="question_show" method="get">
      <div class="col s6 offset-s3" >
                  <input type="text" required name="subject" style="border-style:groove; border-radius:10px;background-color:white;padding:5px;" placeholder="Search here  ...">
          </div>
      </form>
      </div>
  </div>

</center>

@stop
