@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container">
		<h1>Welcome to Pizzasys</h1>
		<p>A pizzeria management system</p>
		<p>{{ link_to(route('register'),'Register now &raquo;',['class'=>'btn btn-primary btn-lg']) }}</p>
	</div>
</div>

<div class="container">
	<!-- Awesome marketing talk -->
	<div class="row">
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
	</div>
</div>

@stop