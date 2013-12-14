@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Nuolaidos</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Discounts manage form-->
		<div class="col-sm-6">
			<table id="discounts-table" class="table table-striped cart-table">
				<colgroup>
				<col class="name-column" />
				<col class="type-column" />
				<col class="percentage-column" />
				<col class="actions-column" />
			</colgroup>
			<thead>
				<tr>
					<th>Pavadinimas</th>
					<th>Tipas</th>
					<th>Reikšmė (%)</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($discounts as $discount)
				<tr class="cart-item">
					<td>{{ $discount->discount->name }}</td>
					<td>{{ $discount->discount->type }}</td>
					<td>{{ $discount->discount->percentage }}</td>
					<td>
						<button class="btn btn-xs btn-danger remove-button fa fa-times"></button>
					</td>
				</tr>
				@endforeach

				@if (count($discounts) === 0)
				<tr>
					<td>Nėra nuolaidų</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>




</div>
</div>



@stop