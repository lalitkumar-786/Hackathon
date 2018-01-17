@extends('master')

@section('title')
	Discussion Thread #<?php echo $id;?>
@stop
@section('css')
<style>
body{
	background-image: url('/images/techandall_wallpaper_1.jpg');
	width: 100%;
	height: 100%;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>
@stop

@section('body')


	<div class="container">
	<center><h3>Discussion Thread #{{$id}}</h3></center>

		<div class="row" style="border-style: groove; border-radius: 10px;background-color: white;padding: 10px;">
			<h5>{{$res->topic}}</h5>
			<p style="font-style: italic;">{{$res->username}}</p><br>
			<p>{{$res->topic_description}}</p>
		</div>

		<?php
			foreach($rep as $row){
		?>

					<div class="row" style="border-style: groove; border-radius: 10px;background-color: white;padding: 10px;">
						<b><p style="font-style: italic;">{{$row->username}} </b>commented:</p><br>
						<p>{{$row->message}}</p>
					</div>

		<?php
			}
		?>
		<br>
	<form method="post" action="/add_comment">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="id" value="{{$id}}">
		<div class="row" style="border-style: groove; border-radius: 10px;background-color: white;padding: 10px;">
			<textarea name="msg" style="height:auto; padding: 10px;border-style: groove; border-radius: 10px;" rows="2" placeholder="Reply to this thread"></textarea>
		</div>
		<div class="row">
			<div class="col s1 offset-s10">
				<button class="btn waves-effect" name="submit" type="submit">Reply</button>
			</div>
		</div>
	</form>
	</div>


@stop
