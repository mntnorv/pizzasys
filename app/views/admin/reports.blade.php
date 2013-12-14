@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Ataskaitų kūrimas</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- User manage form-->
		<div class="col-sm-6">
			@include('forms.reports_form')
		</div>
	</div>
</div>

@stop