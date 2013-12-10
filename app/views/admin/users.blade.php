@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>User management</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- User manage form-->
		<div class="col-sm-6">
			@include('forms.manage_users_form')
		</div>
	</div>
</div>

@stop