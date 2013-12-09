@extends('layout')

@section('content')

<div class="container">
	<div class="col-md-3">
		<ul class="category-list">
			@foreach ($foodTypes as $type)
				<li>
					{{
						link_to_route(
							'foodCategory',
							$type->displayName,
							$parameters = array(
								'category' => $type->name
							),
							$attributes = array()
						)
					}}
				</li>
			@endforeach
		</ul>
	</div>
	<div class="col-md-9">
		<div class="row food-list">
			@foreach ($food as $oneFood)
				<div class="col-md-4 food-item">
					{{ $oneFood->name }}
				</div>
			@endforeach
		</div>
	</div>
</div>

@stop