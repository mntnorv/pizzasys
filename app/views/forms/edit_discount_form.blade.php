{{ Form::model($discount, array('class' => 'form-horizontal', 'id' => 'discount-edit-form')) }}

	<div class="form-group" style="display:none;">
		{{ Form::label('discount_id', 'Nuolaidos id:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('discount_id', $discount->id, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- Discount edit -->
	<div class="form-group">
		{{ Form::label('name', 'Pavadinimas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('name', $discount->name, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- User edit -->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('type', $discountTypes, $discount->discount_type_id, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- Percentage edit -->
	<div class="form-group">
		{{ Form::label('percentage', 'Reikšmė (%):', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('percentage', $discount->percentage, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Atnaujinti', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
