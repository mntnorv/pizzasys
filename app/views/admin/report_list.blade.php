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
	</div>

	<table class="table">
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
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reports as $report)
				<tr>
					<td>{{$report->name}}</td>
					<td>{{$report->reportType->name}}</td>
					<td>{{$report->start}}</td>
					<td>{{$report->end}}</td>					
					<td>
						{{
							link_to_route('admin.report.edit', 'Redaguoti',
								array('id' => $report->id),
								array('class' => 'btn btn-primary btn-xs')
							);
						}}
						<button class="btn btn-danger btn-sm remove-button fa fa-times" onclick="return confirm('Are you sure?')" data-report-id="{{$report->id}}"></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop