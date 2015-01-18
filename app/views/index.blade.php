@extends('layouts.master')

@section('title')
{{Lang::get('messages.title')}}
@stop

@section('css')
	@parent
	{{ HTML::style('css/index.css') }}
	{{ HTML::style('css/steveeffect.css') }}
@stop

@section('searchengine')
	@include('layouts.searchengine')
@stop

@section('content')
<div class="container">
	<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-right">
		<img alt="JD" src="https://media.licdn.com/mpr/mpr/shrink_200_200/p/4/005/0ab/3a9/0d5d928.jpg" class="img-circle img-responsive">
	</div>
	<div class="col-lg-10 col-md-10 col-sm-10">
		<h3>{{Lang::get('messages.welcome_title')}}<img src="img/plaintext.png" alt="Lone Good"> ?</h3>
		<h4>{{Lang::get('messages.welcome_line1')}}</h4>
		<p>{{Lang::get('messages.welcome_line2')}}</p>
		<h4>{{Lang::get('messages.welcome_line3')}}</h4>
		<p><i>- {{Lang::get('messages.welcome_signature')}}</i></p>
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