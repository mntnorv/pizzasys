@extends('layouts.master')

@section('content')

<div class="container">
	<div class="page-header">
		<h1> {{ Auth::user()->username }} </h1>
	</div>
</div>

@stop