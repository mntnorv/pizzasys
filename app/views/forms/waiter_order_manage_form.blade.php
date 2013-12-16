{{ Form::open(array('action' => 'WaiterController@saveOrder', 'class' => 'form-horizontal', 'id' => 'waiter-order-manage-form')) }}

	<!--  Waiter tables  -->
	<div class="form-group ui-widget">
		{{ Form::label('table', 'Stalas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('table', $waiterTables, NULL, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!--  Waiter table orders  -->
	<div class="form-group ui-widget">
		{{ Form::label('orders', 'Stalo užsakymai:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('orders', $firstTableOrdersList, NULL, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!--  Waiter table order state  -->
	<div class="form-group ui-widget">
		{{ Form::label('paid', 'Apmokėta:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('paid', $orderStatusList, $firstPayState, array( 'class' => 'form-control'))}}
		</div>
	</div>
	
	<!-- Maistas autocomplete field-->
	<div class="form-group ui-widget">
		{{ Form::label('food', 'Maistas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('food', NULL, array( 'class' => 'form-control', 'id' => 'query'))}}
		</div>
	</div>

	<div class="form-group" id="suggestions">
	</div>
	<table id="waiter-order-manage-table" class="table table-striped cart-table">
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