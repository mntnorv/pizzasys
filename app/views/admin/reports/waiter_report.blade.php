@extends('layouts.report')

@section('title')
	Padavėjų ataskaita
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>
			{{$report->name}}		
		</h1>

	</div>
	<div>
		<h4>
			Padavėjų ataskaita		
			<span class="pull-right">
				Nuo {{$report->start}} Iki {{$report->end}}
			</span>
		</h4>
		<hr/>
	</div>
	
	<table class="table" id="reports-list-form">
		<colgroup>
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
		</colgroup>
		<thead>
			<tr>
				<th>Padavėjas</th>
				<th>Picerija</th>
				<th>Užsakymų skaičius</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reportLines as $line)
				<tr class="report-item">
					<td>{{$line->username}}</td>
					<td>{{Pizzeria::find($line->pizzeria_id)->name}}</td>
					<td>{{$line->order_count}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop