<!DOCTYPE html>
<html>
<head>
	<title>
		@section('title')
            Pizzasys
        @show
	</title>
	<?= stylesheet_link_tag() ?>
	<?= javascript_include_tag() ?>
</head>
<body>
	@include('partials.navigation')
	@include('partials.messages')

	@yield('content')

	<div class="container">
		@include('partials.footer')
	</div>
</body>
</html>
