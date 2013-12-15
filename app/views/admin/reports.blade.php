@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Ataskaitų valdymas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li>{{link_to_route('admin.report_list.show', 'Ataskaitos')}}</li>
			<li class="active">Valdymas</li>
		</ol>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- User manage form-->
		<div class="col-sm-6">
			@include('forms.reports_form')
		</div>
	</div>
</div>

@stop