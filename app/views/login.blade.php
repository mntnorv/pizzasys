@extends('layout')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Login</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Login form-->
		<div class="col-sm-6">
			@include('forms/login_form')
		</div>
	</div>
</div>

@stop