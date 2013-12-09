{{ Form::open(array('register' => 'POST', 'class' => 'form-horizontal')) }}

	<!-- Username field -->
	<div class="form-group">
		{{ Form::label('username', 'Username:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
		</div>
		<small class="col-md-offset-4 col-md-8"><em>Username shoud be 6 or more symbols length</em></small>
	</div>

	<!-- Password field -->
	<div class="form-group">
		{{ Form::label('password', 'Password:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
		</div>
		<small class="col-md-offset-4 col-md-8"><em>Password should be 6 or more symbol length</em></small>
	</div>

	<!-- Confirm password field -->
	<div class="form-group">
		{{ Form::label('password_confirmation', 'Confirm password:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirm password', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			<p>{{ Form::submit('Register', array('class' => 'btn btn-primary btn-block btn-lg')) }}</p>
		</div>
	</div>

{{ Form::close() }}
