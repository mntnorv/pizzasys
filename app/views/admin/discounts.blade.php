@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Nuolaidos</h1>
		<ol class="breadcrumb">
			<li>{{link_to_route('admin', 'Administravimas')}}</li>
			<li class="active">Nuolaidos</li>
		</ol>
	</div>

	<!-- Grid-->
	<!-- Discounts display-->
	<table id="discount-table" class="table table-striped discounts-table">
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
			<tr class="discount-item">
				<td>{{ $discount->name }}</td>
				<td>{{ $discount->discountType->name }}</td>
				<td>{{ $discount->percentage }}</td>
				<td>
					{{
						link_to_route('admin.discount.edit', 'Redaguoti',
							array('id' => $discount->id),
							array('class' => 'btn btn-sm btn-primary edit-button discounts-edit') 
						)
					}}
					<button type="button" class="btn btn-sm btn-danger remove-button fa fa-times" data-discount-id="{{$discount->id}}"></button>
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