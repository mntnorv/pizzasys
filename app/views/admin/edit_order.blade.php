@extends('layouts.master')

@section('title')
	Užsakymo redagavimas
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Užsakymo redagavimas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li>{{link_to_route('admin.orders', 'Užsakymai')}}</li>
			<li class="active">Redagavimas</li>
		</ol>
	</div>
	@include('forms.edit_order')
</div>

@stop