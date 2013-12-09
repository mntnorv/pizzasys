@extends('layouts.master')

@section('title')
	Home
@stop

@section('content')

<div class="container">
	<div class="col-md-3">
		<ul class="category-list">
			@include('partials.home.food_type_list')
		</ul>
	</div>
	<div class="col-md-9">
		<div id="home-food-list" class="row food-list">
		</div>
	</div>
</div>

@stop