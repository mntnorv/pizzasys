@extends('layouts.master')

@section('title')
	Pristatymo patvirtinimas
@stop

@section('content')

<div class="container">
	<h1>Patvirtinimas</h1>

	<ol class="breadcrumb">
		<li>{{ link_to_route('cart', 'Krepšelis') }}</li>
		<li>{{ link_to_route('cart.delivery', 'Pristatymo duomenys') }}</li>
		<li class="active">Patvirtinimas</li>
	</ol>

	<h4>Krepšelis</h4>
	<ul class="cart-list">
		
	</ul>

	<table class="table">
		@foreach ($cartOrder->orderFood as $item)
			<tr>
				<td>{{ $item->food->name }}</td>
				<td>{{ $item->amount }}</td>
			</tr>
		@endforeach
	</table>

	<h4>Pristatymo duomenys</h4>
	<table class="table">
		<tr>
			<td>Miestas:</td>
			<td>{{ $cartOrder->city->name }}</td>
		</tr>
		<tr>
			<td>Adresas:</td>
			<td>{{ $cartOrder->address }}</td>
		</tr>
		<tr>
			<td>Namo nr.:</td>
			<td>{{ $cartOrder->building_no }}</td>
		</tr>
		<tr>
			<td>Buto nr.:</td>
			<td>{{ $cartOrder->flat_no }}</td>
		</tr>
		<tr>
			<td>Durų kodas:</td>
			<td>{{ $cartOrder->door_code }}</td>
		</tr>
		<tr>
			<td>Komentaras:</td>
			<td>{{ $cartOrder->comment }}</td>
		</tr>
	</table>

	<div class="row">
		<div class="col-md-2">
			{{ link_to_route('cart.delivery', '< Atgal', NULL, array('class' => 'btn btn-default btn-block btn-lg')) }}
		</div>
	</div>
</div>

@stop