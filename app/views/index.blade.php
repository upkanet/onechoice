@extends('layouts.master')

@section('title')
Don't be spoilt for choice anymore
@stop

@section('css')
	@parent
	{{ HTML::style('css/index.css') }}
	{{ HTML::style('css/steveeffect.css') }}
@stop

@section('content')
<div class="container">
	<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-right">
		<img alt="JD" src="https://media.licdn.com/mpr/mpr/shrink_200_200/p/4/005/0ab/3a9/0d5d928.jpg" class="img-circle img-responsive">
	</div>
	<div class="col-lg-10 col-md-10 col-sm-10">
		<h3>What is LoneGood ?</h3>
		<h4>We have selected only <b>one</b> product, for each of your needs.</h4>
		<p>Not the best and expensive one, neither the low quality cheapest one : we choosed the <b>GOOD</b> product with best value.</p>
		<h4>Don't be spoilt for choice anymore !</h4>
	</div>
</div>
<div class="container-fluid">
	<div class="grid">
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, $product->name, array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
		@foreach($products as $product)
		<figure class="effect-steve">
			{{ HTML::image($product->img_path, 'a picture', array('width' => '480')) }}
			<figcaption>
				<h2>{{ $product->category->name }}</h2>
				<p>{{ $product->name }}</p>
				<a href="{{ $product->category->permalink.'/'.$product->permalink }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
	</div>
</div>
@stop