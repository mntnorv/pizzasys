@extends('layouts.master')

@section('title')
	Nuolaidų redagavimas
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Nuolaidų redagavimas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li>{{link_to_route('admin.discounts', 'Nuolaidos')}}</li>
			<li class="active">Nuolaidų redagavimas</li>
		</ol>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Discount edit form-->
		<div class="col-sm-6">
			@include('forms.discount_form')
		</div>
	</div>
</div>

@stop