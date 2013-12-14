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

	<div class="row">
		<div class="col-md-6">
			<h4>Krepšelis</h4>

			<table class="table">
				@foreach ($cartOrder->orderFood as $item)
					<tr>
						<td>{{ $item->food->name }}</td>
						<td class="align-right">{{ $item->amount }}</td>
					</tr>
				@endforeach
			</table>
		</div>
		<div class="col-md-6">
			<h4>Pristatymo duomenys</h4>
			<table class="table">
				<colgroup>
					<col style="width: 25%;" />
				</colgroup>
				<tr>
					<td class="bold align-right">Miestas:</td>
					<td>{{ $cartOrder->city->name }}</td>
				</tr>
				<tr>
					<td class="bold align-right">Adresas:</td>
					<td>{{ $cartOrder->address }}</td>
				</tr>
				<tr>
					<td class="bold align-right">Namo nr.:</td>
					<td>{{ $cartOrder->building_no }}</td>
				</tr>
				<tr>
					<td class="bold align-right">Buto nr.:</td>
					<td>{{ $cartOrder->flat_no }}</td>
				</tr>
				<tr>
					<td class="bold align-right">Durų kodas:</td>
					<td>{{ $cartOrder->door_code }}</td>
				</tr>
				<tr>
					<td class="bold align-right">Komentaras:</td>
					<td>{{ $cartOrder->comment }}</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2">
			{{ link_to_route('cart.delivery', '< Atgal', NULL, array('class' => 'btn btn-default btn-block btn-lg')) }}
		</div>
		<div class="col-md-offset-6 col-md-4">
			{{ link_to_route('cart.order', 'Užsakyti', NULL, array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>
</div>

@stop