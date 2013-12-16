@extends('layouts.master')

@section('title')
	Ataskaitų valdymas
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Ataskaitų valdymas</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li class="active">Ataskaitos</li>
		</ol>
		
	{{link_to_route('admin.report.pdf', 'PDF', array('id' => '1'))}}
	</div>

	<table class="table" id="reports-list-form">
		<colgroup>
			<col style="width: 20%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
		</colgroup>
		<thead>
			<tr>
				<th>Pavadinimas</th>
				<th>Tipas</th>
				<th>Data nuo</th>
				<th>Data iki</th>
				<th>{{link_to_route('admin.report.create', 'Sukurti naują', null, array( 'class' => 'btn btn-success btn-xs'))}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reports as $report)
				<tr class="report-item">
					<td>{{link_to_route('admin.report.show', $report->name,
								array('id' => $report->id), array('target' => '_blank'));
						}}</td>
					<td>{{$report->reportType->name}}</td>
					<td>{{$report->start}}</td>
					<td>{{$report->end}}</td>					
					<td>
						{{link_to_route('admin.report.pdf', 'Parsisiųsti',
							array('id' => '1'),
							array('class' => 'btn btn-primary btn-xs'))}}
						{{
							link_to_route('admin.report.edit', 'Redaguoti',
								array('id' => $report->id),
								array('class' => 'btn btn-primary btn-xs')
							);
						}}
						<button class="btn btn-danger btn-xs remove-button" data-report-id="{{$report->id}}"><span class="fa fa-times"></span></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop