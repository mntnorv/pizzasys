<!DOCTYPE html>
<html>
<head>
	<title>Pizzasys</title>
	<?= stylesheet_link_tag() ?>
	<?= javascript_include_tag() ?>
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
