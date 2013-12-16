@extends('layouts.report')

@section('title')
	Padavėjų ataskaita
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Padavėjų ataskaita</h1>

	</div>
	<div>

		<?php echo "<pre>"; var_dump($reports); echo "</pre>"; ?>
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
			@foreach ($reports as $report)
				<tr class="report-item">
					<td>{{$report->username}}</td>
					<td>{{Pizzeria::find($report->pizzeria_id)->name}}</td>
					<td>{{$report->order_count}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop