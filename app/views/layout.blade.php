<!DOCTYPE html>
<html>
<head>
	<title>Chattr</title>
	@stylesheets('main')
	@javascripts('main')
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
