<!DOCTYPE html>
<html>
<head>
	<title>
		@section('title')
            Pizzasys
        @show
	</title>
	<?= stylesheet_link_tag() ?>
</head>
<body>
	@yield('content')

	<div class="container">
		@include('partials.footer')
	</div>
</body>
</html>
