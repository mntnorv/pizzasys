<table id="cart-table" class="table table-striped cart-table">
	<colgroup>
		<col class="food-column" />
		<col class="amount-column" />
		<col class="price-column" />
		<col class="actions-column" />
	</colgroup>
	<thead>
		<tr>
			<th>Maistas</th>
			<th class="align-right">Kiekis</th>
			<th class="align-right">Kaina</th>
			<th></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td>Iš viso:</td>
			<td></td>
			<td class="align-right">
				<span id="full-price">{{ $cartPrice }}</span> Lt
			</td>
		</tr>
	</tfoot>
	<tbody>
		@foreach ($cartItems as $item)
			<tr
				class="cart-item"
				data-food="{{ $item->food->id }}"
				data-price="{{ $item->food->price }}"
			>
				<td>{{ $item->food->name }}</td>
				<td class="align-right">
					<input type="text" class="amount-input" value="{{ $item->amount }}" />
				</td>
				<td class="align-right">
					<span class="price">{{ $item->food->price * $item->amount }}</span> Lt
				</td>
				<td>
					<button class="btn btn-xs btn-danger remove-button fa fa-times"></button>
				</td>
			</tr>
		@endforeach

		@if (count($cartItems) === 0)
			<tr>
				<td>Krepšelis tuščias</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		@endif
	</tbody>
</table>