{{ Form::open(array('cart.delivery' => 'POST', 'class' => 'form-horizontal')) }}

	<div class="row">
		<div class="col-md-6">
			<!-- City field -->
			<div class="form-group">
				{{ Form::label('city', 'Miestas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::select('city_id', $cities, $orderInfo->city_id, array('class' => 'form-control')) }}
				</div>
			</div>

			<!-- Address fields -->
			<div class="form-group">
				{{ Form::label('street', 'Gatvė:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('street', $orderInfo->street, array('placeholder' => 'Gatvė', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('building_no', 'Namo numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('building_no', $orderInfo->building_no, array('placeholder' => 'Namo numeris', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('flat_no', 'Buto numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('flat_no', $orderInfo->flat_no, array('placeholder' => 'Buto numeris', 'class' => 'form-control')) }}
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<!-- Telephone number field -->
			<div class="form-group">
				{{ Form::label('tel_no', 'Telefonas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('tel_no', $orderInfo->tel_no, array('placeholder' => 'Telefonas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Door code field -->
			<div class="form-group">
				{{ Form::label('door_code', 'Durų kodas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('door_code', $orderInfo->door_code, array('placeholder' => 'Durų kodas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Comment field -->
			<div class="form-group">
				{{ Form::label('comment', 'Komentaras:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::textarea('comment', $orderInfo->comment, array('placeholder' => 'Komentaras', 'class' => 'form-control')) }}
				</div>
			</div>
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-2">
			{{ link_to_route('cart', '< Atgal', NULL, array('class' => 'btn btn-default btn-block btn-lg')) }}
		</div>
		<div class="col-md-offset-6 col-md-4">
			{{ Form::submit('Toliau >', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
