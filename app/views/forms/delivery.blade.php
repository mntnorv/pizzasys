{{ Form::open(array('cart.delivery' => 'POST', 'class' => 'form-horizontal')) }}


	<div class="row">
		<div class="col-md-6">
			<!-- City field -->
			<div class="form-group">
				{{ Form::label('city', 'Miestas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('city', NULL, array('placeholder' => 'Miestas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Address fields -->
			<div class="form-group">
				{{ Form::label('street', 'Gatvė:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('street', NULL, array('placeholder' => 'Gatvė', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('building_no', 'Namo numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('building_no', NULL, array('placeholder' => 'Namo numeris', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('flat_no', 'Buto numeris:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('flat_no', NULL, array('placeholder' => 'Buto numeris', 'class' => 'form-control')) }}
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<!-- Telephone number field -->
			<div class="form-group">
				{{ Form::label('tel_no', 'Telefonas:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('tel_no', NULL, array('placeholder' => 'Telefonas', 'class' => 'form-control')) }}
				</div>
			</div>

			<!-- Comment field -->
			<div class="form-group">
				{{ Form::label('comment', 'Komentaras:', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::textarea('comment', NULL, array('placeholder' => 'Komentaras', 'class' => 'form-control')) }}
				</div>
			</div>
		</div>
	</div>

	<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-2">
			{{ link_to_route('cart', '< Atgal', NULL, array('class' => 'btn btn-default btn-block btn-lg')) }}
		</div>
		<div class="col-md-offset-6 col-md-4">
			{{ Form::submit('Toliau >', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>

{{ Form::close() }}
