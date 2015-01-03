@extends('layouts.master')

@section('title')
Lone Good - {{ $category }} - {{ $product->name }}
@stop

@section('css')
	@parent
	{{ HTML::style('css/product.css') }}
@stop

@section('content')
<div class="container-fluid">
	<div class="row bgproduct">
		<div class="prodshadow">
			<br>
			<br>
			<div class="container">
				<div class="col-lg-3 text-right">
					<img src="{{ $product->img_path }}" width="235" height="177" class="imgproduct">
				</div>
				<div class="col-lg-9">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				<h2 class="col-lg-6 titleproduct">{{ $product->name }}</h2>
			</div>
		</div>
	</div>
</div>

<br>

<div class="container">
	<div class="col-lg-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">7 reasons to buy it</h3>
			</div>
			<div class="panel-body">
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg1 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg2 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg3 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg4 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg5 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg6 }}<br>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ $product->arg7 }}<br>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-lg-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Read more</h3>
			</div>
			<div class="panel-body">
				<a href="{{ $product->art1_url }}" target="_new"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $product->art1 }}</a><br>
				<a href="{{ $product->art2_url }}" target="_new"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $product->art2 }}</a><br>
				<a href="{{ $product->art3_url }}" target="_new"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $product->art3 }}</a><br>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-lg-offset-1">
		<button class="btn btn-primary btn-lg  btn-block">Buy</button>
		<p class="text-center"><small><em>with Amazon</em></small></p>
	</div>
</div>
@stop