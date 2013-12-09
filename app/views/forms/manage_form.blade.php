{{ Form::model($users, array('class' => 'form-horizontal', 'id' => 'user-manage-form')) }}
<?php var_dump(UserType::All()->lists('name', 'id')); ?>


	<!-- Username select -->
	<div class="form-group">
		{{ Form::label('user', 'Username:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('user', $users->lists('username', 'id'), NULL, array( 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- User controls blocked -->
	<div class="form-group">
		{{ Form::label('blocked', 'Blokuotas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::checkbox('blocked', NULL, NULL, NULL)}}
		</div>
	</div>

	<!-- User controls type-->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('type', $userTypes, NULL, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- User controls password-->
	<div class="form-group">
		{{ Form::label('password', 'Slaptažodis:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('password', NULL, array( 'class' => 'form-control'))}}
		</div>
	</div>


	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Update', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}