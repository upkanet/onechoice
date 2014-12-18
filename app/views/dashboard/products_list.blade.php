	<p class="text-center bg-info">Avg : {{ $avg_price }} &euro;</p>
	<div class="list-group">
	@foreach($products_list as $product)
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">{{ $product['name'] }} <span class="badge">{{ $product['score'] }}</span></h4>
			<p class="list-group-item-text">{{ $product['price'] }} &euro; - <span class="label label-success">{{ $product['rating'] }}</span></p>
			<h6><i>{{ $product['rconnector'] }}</i></h6>
		</a>
	@endforeach
	</div>