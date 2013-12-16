@extends('layouts.report')

@section('title')
	Užsakymų ataskaita
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
			Užsakymų ataskaita		
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
				<th>Picerija</th>
				<th>Užsakymų skaičius</th>
				<th>Apyvarta</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reportLines as $line)
				<tr class="report-item">
					<td>{{$line->pizzeria_name}}</td>
					<td>{{$line->order_count}}</td>
					<td>{{$line->income}} Lt</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop