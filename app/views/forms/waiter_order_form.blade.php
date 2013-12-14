{{ Form::open(array('login' => 'POST', 'class' => 'form-horizontal')) }}
	<!-- Maistas autocomplete field-->
	<div class="form-group ui-widget">
		{{ Form::label('food', 'Maistas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('food', NULL, array( 'class' => 'form-control', 'id' => 'query'))}}
		</div>
	</div>

	<div class="form-group" id="suggestions">
	</div>
	<table id="waiter-order-table" class="table table-striped cart-table">
		<colgroup>
		<col class="food-column" />
		<col class="amount-column" />
		<col class="price-column" />
		<col class="actions-column" />
	</colgroup>
	<thead>
		<tr>
			<th>Maistas</th>
			<th class="align-right">Kiekis</th>
			<th class="align-right">Kaina</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
	<tfoot>
		<tr>
			<td>Iš viso: </td>
			<td></td>
			<td class="align-right">
				<span id="full-price">  0</span> Lt
			</td>
		</tr>
	</tfoot>
</table>

{{Form::submit('Užsakyti', array('class' => 'btn btn-primary btn-block btn-lg'))}}

{{ Form::close() }}