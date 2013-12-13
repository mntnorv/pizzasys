@extends('layouts.master')

@section('title')
	Krepšelis
@stop

@section('content')

<div class="container">
	<h1>Krepšelis</h1>

	<ol class="breadcrumb">
		<li class="active">Krepšelis</li>
		<li>Pristatymo duomenys</li>
		<li>Patvirtinimas</li>
	</ol>

	@include('partials.cart_table')
	
	<div class="row">
		<div class="col-md-offset-8 col-md-4">
			{{ link_to_route('cart.delivery', 'Užsakyti', NULL, array('class' => 'btn btn-lg btn-primary btn-block')) }}
		</div>
	</div>
</div>

@stop