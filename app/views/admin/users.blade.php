@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Vartotojų valdymas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li class="active">Vartotojai</li>
		</ol>
	</div>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- User manage form-->
		<div class="col-sm-6">
			@include('forms.manage_users_form')
		</div>
	</div>
</div>

@stop