{{ Form::model($users, array('class' => 'form-horizontal')) }}
{{var_dump($users[0]->type())}}

	<!-- Username select -->
	<div class="form-group">
		{{ Form::label('username', 'Username:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('username', $users->lists('username', 'id'), NULL, array( 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- User controls blocked -->
	<div class="form-group">
		{{ Form::label('blokuotas', 'Blokuotas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::checkbox('blokuotas', '1', NULL, NULL)}}
		</div>
	</div>

	<!-- User controls type-->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('tipas', 'xujotas', NULL, NULL)}}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Update', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}