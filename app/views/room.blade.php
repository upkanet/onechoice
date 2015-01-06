@extends('layouts.master')

@section('title')
One Choice - Only the Good Product for each Need
@stop

@section('css')
	@parent
	{{ HTML::style('css/index.css') }}
	{{ HTML::style('css/steveeffect.css') }}
@stop

@section('content')
<div class="container-fluid">
	<div class="grid">
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ asset($product->category->permalink.'/'.$product->permalink) }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
	</div>
</div>
@stop