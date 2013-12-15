@extends('layouts.master')

@section('title')
	Užsakymo redagavimas
@stop

@section('content')

<div class="container">
	<h1>Užsakymo redagavimas</h1>

	@include('forms.edit_order')
</div>

@stop