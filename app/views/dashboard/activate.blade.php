<h4>{{$product->name}}</h4>
<p>
	@if($product->isActive)
		<span class="label label-success">activated</span>
	@else
		<span class="label label-danger">not activated</span>
	@endif
</p>
<a href="{{$product->category->permalink}}/{{$product->permalink}}" class="btn btn-primary btn-block" target="_blank">Product page</a>
<br>
<p>Do you really want to activate this product ?</p>