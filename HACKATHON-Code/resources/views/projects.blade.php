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
	PROJECTS
@stop

@section('body')
<div class="container">
	<div class="row" style="padding-top:120px">
		<div class="col l4 offset-l2">
	<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/find.png">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Find Projects<i class="material-icons right">more_vert</i></span>
      <p><a href="/find_projects">Click here</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Find Projecs<i class="material-icons right">close</i></span>
      <p>this option coud be used to search for the previously existing projects.</p>
    </div>
  </div>
</div>

<div class="col l4 offset-l1">
<div class="card">
<div class="card-image waves-effect waves-block waves-light">
	<img class="activator" src="images/add.png">
</div>
<div class="card-content">
	<span class="card-title activator grey-text text-darken-4">Add Projects<i class="material-icons right">more_vert</i></span>
	<p><a href="/add_projects">Click here</a></p>
</div>
<div class="card-reveal">
	<span class="card-title grey-text text-darken-4">Add Projects<i class="material-icons right">close</i></span>
	<p>You can add your own project and work on it in coordination with others.</p>
</div>
</div>
</div>
</div>
</div>
@stop
