@extends('layouts.master')

@section('title')
	Užsakymų valdymas
@stop

@section('content')

<div class="container">
	
	<div class="page-header">
		<h1>Užsakymų valdymas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li class="active">Užsakymai</li>
		</ol>
	</div>
	<table class="table">
		<colgroup>
			<col style="width: 20%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
		</colgroup>
		<thead>
			<tr>
				<th>Laikas</th>
				<th>Suma</th>
				<th>Tipas</th>
				<th>Būsena</th>
				<th>Apmokėjimo būsena</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{$order->created_at}}</td>
					<td>{{$order->price}} Lt</td>
					<td>{{$order->orderType->name}}</td>
					<td>{{$order->orderState->name}}</td>
					<td>{{$order->orderPaymentState->name}}</td>
					<td>
						{{
							link_to_route('admin.order.edit', 'Redaguoti',
								array('id' => $order->id),
								array('class' => 'btn btn-primary btn-xs')
							);
						}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop