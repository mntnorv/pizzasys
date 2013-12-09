<!DOCTYPE html>
<html>
<head>
	<title>Chattr</title>
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
