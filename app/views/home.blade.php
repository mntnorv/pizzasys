@extends('layouts.master')

@section('title')
	Home
@stop

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
				<div class="col-md-4">
					<div class="food-item">
						<img
							class="food-item-image"
							src="{{url('assets/default_food.png')}}"
						/>
						<div class="food-item-name">
							{{ $oneFood->name }}
							<span class="pull-right">
								{{ $oneFood->price }} Lt
							</span>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@stop