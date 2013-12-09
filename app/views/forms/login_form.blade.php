{{ Form::open(array('login' => 'POST', 'class' => 'form-horizontal')) }}

	<!-- Username field -->
	<div class="form-group">
		{{ Form::label('username', 'Username:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Password field -->
	<div class="form-group">
		{{ Form::label('password', 'Password:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Login', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
