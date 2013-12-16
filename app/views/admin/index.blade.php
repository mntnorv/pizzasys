@extends('layouts.master')

@section('title')
	Administravimas
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Administravimas</h1>
		<ol class="breadcrumb">
			<li class="active">Administravimas</li>
		</ol>
	</div>

	<!-- Grid-->
	<ul>
		<li>{{ link_to_route('admin.users', 'Vartotojų valdymas') }}</li>
		<li>{{ link_to_route('admin.orders', 'Užsakymų valdymas') }}</li>
		<li>{{ link_to_route('admin.discounts', 'Nuolaidų valdymas') }}</li>
		<li>{{ link_to_route('admin.reports', 'Ataskaitų valdymas') }}</li>
	</ul>
</div>

@stop