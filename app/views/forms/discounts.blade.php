{{ Form::model($discount, array('class' => 'form-horizontal', 'id' => 'discount-form')) }}

	<!-- Discounts select -->
	<div class="form-group">
		{{ Form::label('discount', 'Discount:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('user_id', $users->lists('username', 'id'), NULL, array( 'class' => 'form-control', 'id' => 'user_id')) }}
		</div>
	</div>

{{ Form::close() }}
