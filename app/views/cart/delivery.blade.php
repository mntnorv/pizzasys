@extends('layouts.master')

@section('title')
	Pristatymo duomenys
@stop

@section('content')

<div class="container">
	<h1>Pristatymo duomenys</h1>

	<ol class="breadcrumb">
		<li>{{ link_to_route('cart', 'Krepšelis') }}</li>
		<li class="active">Pristatymo duomenys</li>
		<li>Patvirtinimas</li>
	</ol>

	@include('forms.delivery')
</div>

@stop