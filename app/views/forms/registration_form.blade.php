{{ Form::open(array('register' => 'POST', 'class' => 'form-horizontal')) }}

	<!-- Username field -->
	<div class="form-group">
		{{ Form::label('username', 'Vartotojo vardas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'Vartotojo vardas', 'class' => 'form-control')) }}
		</div>
		<small class="col-md-offset-4 col-md-8"><em>Vartotojo vardas turi būti 6 simbolių arba ilgesnis</em></small>
	</div>

	<!-- Password field -->
	<div class="form-group">
		{{ Form::label('password', 'Slaptažodis:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password', array('placeholder' => 'Slaptažodis', 'class' => 'form-control')) }}
		</div>
		<small class="col-md-offset-4 col-md-8"><em>Slaptažodis turi būti 6 simbolių arba ilgesnis</em></small>
	</div>

	<!-- Confirm password field -->
	<div class="form-group">
		{{ Form::label('password_confirmation', 'Pakartokite slaptažodį:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password_confirmation', array('placeholder' => 'Pakartokite slaptažodį', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			<p>{{ Form::submit('Registruotis', array('class' => 'btn btn-primary btn-block btn-lg')) }}</p>
		</div>
	</div>

{{ Form::close() }}
