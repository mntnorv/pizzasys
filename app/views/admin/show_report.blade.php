@extends('layouts.master')

@section('title')
	Ataskaitos rodymas
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Ataskaitos rodymas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>			
			<li>{{link_to_route('admin.reports.show', 'Ataskaitos')}}</li>
			<li class="active">Rodymas</li>
		</ol>
	</div>
	<div>
	{{link_to_route('admin.report.pdf', 'PDF', array('id' => '1'))}}
	</div>
	<div>

		<?php echo "<pre>"; var_dump($report); echo "</pre>"; ?>
	</div>	
</div>

@stop