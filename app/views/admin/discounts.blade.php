@extends('layouts.master')

@section('title')
	Nuolaidos
@stop


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
				<th>Nuolaida (%)</th>
				<th>
				{{ 
					link_to_route('admin.discount.create', 'Sukurti naują',
						NULL,
						array('class' => 'btn btn-xs btn-success') 
					)
				}}
				</th>
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
				<td>{{ $discount->discountType->name }}
				@if ($discount->discount_type_id === 1)
					({{ $discount->food->name }})
				@elseif ($discount->discount_type_id === 2)
					({{ $discount->foodType->displayName }})
				@endif 
				</td>
				<td>{{ $discount->percentage }}</td>
				<td>
					{{
						link_to_route('admin.discount.edit', 'Redaguoti',
							array('id' => $discount->id),
							array('class' => 'btn btn-xs btn-primary') 
						)
					}}
					<button type="button" class="btn btn-xs btn-danger remove-button" data-discount-id="{{$discount->id}}"><span class="fa fa-times"></span></button>
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