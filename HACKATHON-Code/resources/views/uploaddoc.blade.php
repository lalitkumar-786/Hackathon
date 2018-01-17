@extends('master')

@section('title','uploaddoc')
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

    <div class="container">
        <form class="col s7" action="/submitted" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type='hidden' name="_token" value="{{csrf_token()}}">
                <div class="form">
                    <br><br><br>
                <div class="row">
                <div class="col s3" >
                  <div class="input-field " style="border-style:groove; border-radius:10px;background-color:white;padding:5px;">
            <select >
              <option value="" disabled selected>Choose your Doc</option>
              <option value="1">Subjects</option>
              <option value="2">Question papers</option>
              <option value="3">Tutorials</option>
            </select>
        </div>


                </div>
                <div class="col s3 offset-s1"><br>
                    <input type="text" style="border-style:groove; border-radius:10px;background-color:white;padding:5px;" placeholder="Write topic ..." name="course_code">
                </div>
                </div>
                <div class="row" style="border-style:groove; border-radius:10px;background-color:white;">
                        <textarea style="height:auto; padding:10px;" rows="10" placeholder="Description about.."
                                   name="description"></textarea>
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type = "text" placeholder="Upload">
                        </div>
                    </div>
                    <button class="btn" name="submit" type="submit">Submit</button>


                </div>
            </div>
        </form>
</div>

</center>

@stop
