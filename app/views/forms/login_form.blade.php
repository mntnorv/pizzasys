{{ Form::open(array('login' => 'POST', 'class' => 'form-horizontal')) }}

	<!-- Username field -->
	<div class="form-group">
		{{ Form::label('username', 'Vartotojo vardas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'Vartotojo vardas', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Password field -->
	<div class="form-group">
		{{ Form::label('password', 'Slaptažodis:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password', array('placeholder' => 'Slaptažodis', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Prisijungti', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
