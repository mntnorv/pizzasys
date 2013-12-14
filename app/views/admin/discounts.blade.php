@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Nuolaidos</h1>
		<ol class="breadcrumb">
			<li>Adminstravimas</li>
			<li class="active">Nuolaidos</li>
		</ol>
	</div>

	<!-- Grid-->
	<!-- Discounts display-->
	<table id="discounts-table" class="table table-striped discounts-table">
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
			<th></th>
		</tr>
	</thead>
		<tfoot>
		<tr>
			<td></td>
		</tr>
	</tfoot>
	<tbody>
		@foreach ($discounts as $discount)
		<tr class="cart-item">
			<td>{{ $discount->name }}</td>
			<td>{{ $discount->type }}</td>
			<td>{{ $discount->percentage }}</td>
			<td>
				<button type="button" class="btn btn-s btn-default edit-button discounts-edit">Redaguoti</button> 
				<button type="button" class="btn btn-s btn-danger remove-button fa fa-times"></button>
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



@stop