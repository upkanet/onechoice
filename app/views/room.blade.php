@extends('layouts.master')

@section('title')
{{ $room->name }}
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
<div class="container-fluid">
	<div class="grid">
		@foreach($categories as $category)
		<figure class="effect-steve">
			{{ HTML::image($category->product->img_path, $category->product->name, array('width' => '480')) }}
			<figcaption>
				<h2>{{ $category->name }}</h2>
				<p>{{ $category->product->name }}</p>
				<a href="{{ asset($category->permalink.'/'.$category->product->permalink) }}">View more</a>
			</figcaption>			
		</figure>
		@endforeach
	</div>
</div>
@stop