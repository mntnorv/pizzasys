@extends('layout')

@section('content')

<div class="container">
	<div class="row food-list">
		@foreach ($food as $oneFood)
			<div class="col-md-4 food-item">
				{{ $oneFood->name }}
			</div>
		@endforeach
	</div>
</div>

@stop