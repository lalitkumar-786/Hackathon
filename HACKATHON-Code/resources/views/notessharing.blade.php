@extends('master')
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

                    <div class="container" style="margin-top:15%">
                        <h4>   Or upload your docs...</h4>
                    <div class="row" >
                        <div class="col s6 offset-s3">
                                <a href="uploaddoc"><button class="btn waves-effect waves-light" type="submit" name="action">Upload now !</button></a>
                        </div>
                    </div>
                    </div>


</center>

@stop
