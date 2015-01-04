@extends('layouts.master')

@section('title')
One Choice - Only the Good Product for each Need
@stop

@section('css')
	@parent
	{{ HTML::style('css/index.css') }}
@stop

@section('content')
<div class="container">
	<div class="row">
	@foreach($products as $product)
		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
		    <a href="{{ $product->category->permalink }}/{{ $product->permalink }}" class="thumbnail thbox" style="background: url('{{$product->img_path}}') no-repeat center center;">
		    	<div class="thprodname">
		      		<h3>{{ $product->category->name }}</h3>
		      		<h4>{{ $product->name }}</h4>
		      	</div>
		    </a>
		</div>
	@endforeach
	</div>
</div>
@stop