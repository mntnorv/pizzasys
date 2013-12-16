<!DOCTYPE html>
<html>
<head>
	<title>
		@section('title')
            Pizzasys
        @show
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<?= stylesheet_link_tag() ?>
</head>
<body>
	@yield('content')

	<div class="container">
		@include('partials.footer')
	</div>
</body>
</html>
