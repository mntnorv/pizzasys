@foreach ($foodTypes as $type)
	<li>
		{{
			link_to_route(
				'foodCategory',
				$type->displayName,
				$parameters = array(
					'category' => $type->name
				),
				$attributes = array()
			)
		}}
	</li>
@endforeach