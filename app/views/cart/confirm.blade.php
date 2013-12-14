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

	Užsakymo duomenys
</div>

@stop