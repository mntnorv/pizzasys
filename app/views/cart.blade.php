@extends('layouts.master')

@section('title')
	Krepšelis
@stop

@section('content')

<div class="container">
	<h1>Krepšelis</h1>
	<table class="table">
		<thead>
			<tr>
				<th>Maistas</th>
				<th>Kiekis</th>
				<th>Kaina</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>Iš viso:</td>
				<td></td>
				<td>{{ $cartPrice }} Lt</td>
			</tr>
		</tfoot>
		<tbody class="table-striped">
			@foreach ($cartItems as $item)
				<tr>
					<td>{{ $item->food->name }}</td>
					<td>{{ $item->amount }}</td>
					<td>{{ $item->food->price * $item->amount }} Lt</td>
				</tr>
			@endforeach
		</tbody>
	</table> 
</div>

@stop