@foreach($products as $product)
	{{ Form::radio('product_activate', $product->id) }} <a href="cat/{{ $product->permalink }}" target="_new">{{ $product->name }}</a>
@if($product->isActive)
	<span class="badge">active</span>
@endif
	<br>
@endforeach