{{ Form::open(array('route' => 'addcontact', 'class' => 'form-horizontal')) }}

	<!-- Search field -->
	<div class="form-group">
		{{ Form::label('add_contact', 'Username:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('contact', '', array('placeholder' => 'Username', 'class' => 'form-control')) }}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Search', array('class' => 'btn btn-block')) }}
		</div>
	</div>

{{ Form::close() }}