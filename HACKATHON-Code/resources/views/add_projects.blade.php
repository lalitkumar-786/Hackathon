@extends('master')
@section('css')
<style>
body{
	background-image: url('images/light-red-NR.jpg');
	width: 100%;
	height: 100%;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>
@stop
@section('title')
	ADD PROJECTS
@stop

@section('body')
<?php
if (isset($errors)) {
    if ($errors->first('f') != '')
       {
?>
<h5 style="padding-left:45%;color:green" id="para" >
<?php
        echo $errors->first('f');
  }}
?></h5>
 <div class="container ">
<div class="row " style="padding-top:100px">
<div><h4 class="center-align">Select filters</h4></div>

    <form class="col s12" action="store_projects" method="post">
      <div class="row">
        <div class="input-field col s6">

          <input name="project_title" type="text" class="validate" required>
          <label  for="project_title">Project Title</label>
        </div>

    <div class="input-field col s6">
        <select>
      		<option value="" disabled selected>Choose your option</option>
      		<option value="1">Ongoing</option>
	      	<option value="2">Completed</option>
	    </select>
    	<label>Current Status</label>
		</div>
	</div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="description" class="materialize-textarea" required></textarea>
          <label for="description">Project Description</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input name="requirements" type="text" class="validate" required>
          <label for="requirements">Requirements</label>
        </div>

      </div>




      <div class="row">
            <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input type="file" multiple required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload one or more files">
          </div>
        </div>

      </div>

      <div class='row'>
      <div class="col l5 m6" style="margin-left:30%" >
        <button class="waves-effect waves-light btn-large" style="width:100%" type="submit">ADD Project</button>
         <input type="hidden" name="_token" value="{{csrf_token()}}">
      </div>
      </div>

    </form>

  </div>


 </div>


@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
@stop
