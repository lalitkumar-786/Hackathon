@extends('master')

@section('title','New Discussion')

@section('css')
<style>
body{
	background-image: url('images/techandall_wallpaper_1.jpg');
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
		<h3>Start New Discussion</h3>
		<form method="post" action="/save_topic">
			<input type='hidden' name="_token" value="{{csrf_token()}}">
			<div class="row">
				<input type="text"  name="title" style="border-style: groove; border-radius: 10px;background-color: white;border-bottom: none;" placeholder="Discussion Title">
			</div>
			<div class="row" style="border-style: groove; border-radius: 10px;background-color: white;">
				<textarea name="topic_desc" style="height:auto;padding: 10px; " rows="10" placeholder="Discussion details here"></textarea>
			</div>
			<div class="row">
				<input type="text"  name="tags" style="border-style: groove; border-radius: 10px;background-color: white;border-bottom: none;" placeholder="Discussion Tags">
			</div>
			<div class="row">
				<button class="waves-effect btn">Start Discussion!</button>
			</div>
		</form>
	</div>
	</center>
@stop
