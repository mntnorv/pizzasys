{{ Form::open(array('class' => 'form-horizontal', 'id' => 'report-edit-form', 'data-report-id' => $report->id)) }}

<!-- Reports name-->
	<div class="form-group">
		{{ Form::label('report_name', 'Pavadinimas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('report_name', $report->name, array( 'class' => 'form-control', 'placeholder' => 'Ataskaita'))}}
		</div>
	</div>

<!-- User controls type-->
	<div class="form-group">
		{{ Form::label('type', 'Tipas:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::select('type', $report_types, $report->report_type_id, array( 'class' => 'form-control'))}}
		</div>
	</div>

<!-- Reports date from-->
	<div class="form-group">
		{{ Form::label('date_from', 'Data nuo:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('date_from', $report->start, array( 'class' => 'form-control', 'placeholder' => '2013-12-01'))}}
		</div>
	</div>

<!-- Reports date to-->
	<div class="form-group">
		{{ Form::label('date_to', 'Data iki:', array('class' => 'col-md-4 control-label')) }}
		<div class="col-md-8">
			{{ Form::text('date_to', $report->end, array( 'class' => 'form-control', 'placeholder' => '2013-12-30'))}}
		</div>
	</div>

<!-- Submit button -->
	<div class="form-group">
		<div class="col-md-offset-4 col-md-8">
			{{ Form::submit('Atnaujinti', array('class' => 'btn btn-primary btn-block btn-lg')) }}
		</div>
	</div>
{{ Form::close() }}
