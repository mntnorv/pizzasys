<!DOCTYPE html>
<html>
<head>
	<title>
		@section('title')
            Pizzasys
        @show
	</title>

	<script type="text/javascript">
		var BASE_URL = '{{ url("/") }}';
	</script>

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
