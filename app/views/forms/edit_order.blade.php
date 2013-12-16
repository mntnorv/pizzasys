{{ Form::open(array('class' => 'form-horizontal', 'id' => 'order-edit-form', 'data-order-id' => $order->id )) }}

	<div class="row">
		<div class="col-md-6">
			<!-- Type field -->
			<div class="form-group">
				{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('type', $types, $order->order_type_id, array('class' => 'form-control')) }}
				</div>
			</div>

			<!-- State field -->
			<div class="form-group">
				{{ Form::label('state', 'Būsena:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('state', $states, $order->order_state_id, array('class' => 'form-control')) }}
				</div>
			</div>

			<!-- Payment state field -->
			<div class="form-group">
				{{ Form::label('payment_state', 'Apmokėjimo būsena:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('payment_state', $payment_states, $order->order_payment_state_id, array('class' => 'form-control')) }}
				</div>
			</div>
			
		</div>
		<div class="col-md-6">

			<!-- City field -->
			<div class="form-group">
				{{ Form::label('city', 'Miestas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('city', $cities, $order->city_id, array('class' => 'form-control')) }}
				</div>
			</div>

			<!-- Pizzeria field -->
			<div class="form-group">
				{{ Form::label('pizzeria', 'Picerija:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('pizzeria', array(), NULL, array('class' => 'form-control', 'data-selected'=> $order->pizzeria_id)) }}
				</div>
			</div>

			<!-- Table field -->
			<div class="form-group" id="table-input-group">
				{{ Form::label('table', 'Staliukas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('table', array(), NULL, array('class' => 'form-control', 'data-selected'=> $order->table_id)) }}
				</div>
			</div>

			<!-- Address fields -->
			<div class="form-group" id="street-input-group">
				{{ Form::label('street', 'Gatvė:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('street', $order->street, array('placeholder' => 'Gatvė', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group" id="building-no-input-group">
				{{ Form::label('building_no', 'Namo numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('building_no', $order->building_no, array('placeholder' => 'Namo numeris', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group" id="flat-no-input-group">
				{{ Form::label('flat_no', 'Buto numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('flat_no', $order->flat_no, array('placeholder' => 'Buto numeris', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Telephone number field -->
			<div class="form-group" id="tel-no-input-group">
				{{ Form::label('tel_no', 'Telefonas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('tel_no', $order->tel_no, array('placeholder' => 'Telefonas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Door code field -->
			<div class="form-group" id="door-code-input-group">
				{{ Form::label('door_code', 'Durų kodas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('door_code', $order->door_code, array('placeholder' => 'Durų kodas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Comment field -->
			<div class="form-group" id="comment-input-group">
				{{ Form::label('comment', 'Komentaras:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::textarea('comment', $order->comment, array('placeholder' => 'Komentaras', 'class' => 'form-control')) }}
				</div>
			</div>

		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		{{ Form::submit('Atnaujinti', array('class' => 'btn btn-primary btn-block btn-lg')) }}
	</div>

{{ Form::close() }}
