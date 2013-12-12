@extends('layouts.master')

@section('title')
	Krepšelis
@stop

@section('content')

<div class="container">
	<h1>Krepšelis</h1>

	<div class="row">
		<div class="col-md-8">
			@include('partials.cart_table')
		</div>
	</div>
</div>

@stop