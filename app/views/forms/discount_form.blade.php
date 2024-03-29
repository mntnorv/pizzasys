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

	<!-- Discount group edit -->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('type', $discountTypes, $discount->discount_type_id, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- Discount type to edit -->
	<div class="form-group" id="type-to-form">
		{{ Form::label('type_to', 'Maistas:', array('class' => 'col-md-4 control-label', 'id' => 'type_to_label')) }}
		<div class="col-md-8">
			{{ Form::select('type_to', array(), NULL, array( 
						'class' => 'form-control',
						'data-selected' => $discountTo 
					))
			}}
		</div>
	</div>

	<!-- Percentage edit -->
	<div class="form-group">
		{{ Form::label('percentage', 'Nuolaida (%):', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('percentage', $discount->percentage, array( 'class' => 'form-control'))}}
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit($button, array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
