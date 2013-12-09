@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row food-list">
		@foreach ($food as $oneFood)
			<div class="food-item">
				<img class="food-item-image" src="assets/default_food.png" />
				<div class="food-item-name">
					{{ $oneFood->name }}
					<span>{{ $oneFood->price }} Lt</span>
				</div>
			</div>
		@endforeach
	</div>
</div>

@stop