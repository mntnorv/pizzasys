{{ Form::open(array('cart.delivery' => 'POST', 'class' => 'form-horizontal')) }}

	<!-- City field -->
	<div class="form-group">
		{{ Form::label('city', 'Miestas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('city', NULL, array('placeholder' => 'Miestas', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Address fields -->
	<div class="form-group">
		{{ Form::label('address1', 'Adresas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('address1', NULL, array('placeholder' => 'Adresas', 'class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::text('address2', NULL, array('placeholder' => 'Adresas', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-4">
			{{ link_to_route('cart', '< Atgal', NULL, array('class' => 'btn btn-link btn-block')) }}
		</div>
		<div class="col-md-offset-4 col-md-4">
			{{ Form::submit('Toliau >', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
