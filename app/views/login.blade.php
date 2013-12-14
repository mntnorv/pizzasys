@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Prisijungimas</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Login form-->
		<div class="col-sm-6">
			@include('forms.login_form')
		</div>
	</div>
</div>

@stop