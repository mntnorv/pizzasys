@extends('layouts.report')

@section('title')
	Užsakymų ataskaita
@stop

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Užsakymų ataskaita</h1>
	</div>
	<div>
		<?php echo "<pre>"; var_dump($reportLines); echo "</pre>"; ?>
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
				<th>Pajamos</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reportLines as $line)
				<tr class="report-item">
					<td>{{Pizzeria::find($line->pizzeria_id)->name}}</td>
					<td>{{$line->order_count}}</td>
					<td>{{$line->income}} Lt</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop