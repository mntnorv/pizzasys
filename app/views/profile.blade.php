@extends('layout')

@section('content')

<div class="container">
	<div class="page-header">
		<h1> {{ Auth::user()->username }} </h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Login form-->
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Add contacts</div>
				<div class="panel-body">
					@include('forms/add_contact')
				</div>
			</div>
		</div>
	</div>
</div>

@stop