@extends('layouts.master')

@section('title')
	Užsakymų valdymas
@stop

@section('content')

<div class="container">
	<h1>Užsakymų valdymas</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Miestas</th>
				<th>Laikas</th>
				<th>Tipas</th>
				<th>Būsena</th>
				<th>Apmokėjimo būsena</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{$order->city->name}}</td>
					<td>{{$order->created_at}}</td>
					<td>{{$order->orderType->name}}</td>
					<td>{{$order->orderState->name}}</td>
					<td>{{$order->orderPaymentState->name}}</td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop