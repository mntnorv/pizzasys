@extends('layout')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>User management</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- User manage form-->
		<div class="col-sm-6">
			@include('forms/manage_form')
		</div>
	</div>
</div>

@stop