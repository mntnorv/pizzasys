{{ Form::open(array('class' => 'form-horizontal')) }}

<!-- Reports name-->
	<div class="form-group">
		{{ Form::label('report_name_label', 'Pavadinimas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('report_name', 'Ataskaita', array( 'class' => 'form-control'))}}
		</div>
	</div>

<!-- User controls type-->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('type', $report_types, null, array( 'class' => 'form-control'))}}
		</div>
	</div>









<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Sukurti', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>
{{ Form::close() }}
