@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Waiter Orderds Manage</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Waiter orders form-->
		<div class="col-sm-6">
			@include('forms.waiter_order_form')
		</div>
	</div>
</div>

@stop