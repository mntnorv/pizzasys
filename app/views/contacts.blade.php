@extends('layout')

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Friend requests</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Friend request list -->
		<ul class="list-group">
			@foreach ($pendingRequests as $request)
				<li class="list-group-item friend-list">
					<p>{{ $request->username }}</p>
					<button class="btn btn-primary btn-sm pull-right" onclick="acceptRequest(<?php echo $request->id; ?>, '<?php echo $request->username; ?>');" >Accept request</button>
				</li>
			@endforeach
		</ul>
	</div>

	<div class="page-header">
		<h1>Your contacts</h1>
	</div>

	<!-- Grid-->
	<div class="row">
		<!-- Contact list -->
		<ul class="list-group">
			@foreach ($contacts as $contact)
				<li class="list-group-item">
					<p>{{ $contact->username }}</p>
				</li>
			@endforeach
		</ul>
	</div>
</div>

@stop