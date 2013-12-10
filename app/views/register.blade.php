@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Registracija</h1>
	</div>

	<!-- Grid -->
	<div class="row">
		<!-- Registration form column -->
		<div class="col-sm-6">
			@include('forms/registration_form')
		</div>
	</div>
</div>

@stop