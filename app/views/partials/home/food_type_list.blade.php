<li><a href="#">Visi</a></li>

@foreach ($foodTypes as $type)
	<li data-food-type="{{$type->name}}">
		{{
			link_to(
				'#' . $type->name,
				$type->displayName
			)
		}}
	</li>
@endforeach