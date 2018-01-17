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
Search result!
@stop


@section('body')
	<table class="centered bordered">
	<tr>
		<td><b>Title</b></td>
		<td><b>Description</b></td>
		<td><b>Requirements</b></td>
		<td><b>Owner<b></td>
	</tr>
	@foreach($res as $user)
	<tr>
		<td>{{$user->title}}</td>
		<td>{{$user->description}}</td>
		<td>{{$user->requirements}}</td>
		<td>{{$user->owner}}</td>

	</tr>
	@endforeach


@stop
