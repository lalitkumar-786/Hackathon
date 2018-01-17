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
	FIND PROJECTS
@stop

@section('body')



<div class="container ">
<div class="row " style="padding-top:100px">
<div><h4 class="center-align">Select filters</h4></div>

    <form class="col s12" action="/view_projects" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input name="project_title" type="text" class="validate" required>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <label for="project_title">Project Title</label>
        </div>

    <div class="input-field col s6">
        <select>
      		<option value="" disabled selected>Choose your option</option>
      		<option value="1">Ongoing</option>
	      	<option value="2">Completed</option>
	    </select>
    	<label>Status</label>
		</div>
	</div>

      <div class="row">
      	<div class="input-field col s12">
          <input name="requirement" type="text" class="validate" required>
          <label for="requirement">Requirements</label>
        </div>
      </div>

      <div class='row'>
      <div class="col l5 m6" style="margin-left:30%" >
      <button type="submit" class="waves-effect waves-light btn-large" style="width:100%">Search</button>
    </div>
    </div>


    </form>


  </div>


 </div>
 <?php
 if (isset($errors)) {
     if ($errors->first('f') != '')
        {
 ?>
 <h5 style="padding-left:38%;color:red" id="para" >
 <?php
         echo $errors->first('f');
   }}
 ?>
</h5>
@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
@stop
