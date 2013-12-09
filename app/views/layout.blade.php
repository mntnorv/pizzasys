<!DOCTYPE html>
<html>
<head>
	<title>Pizzasys</title>
	@stylesheets('application')
	@javascripts('application')
</head>
<body>
	@include('navigation')
	@include('messages')

	@yield('content')

	<div class="container">
		@include('footer')
	</div>
</body>
</html>
