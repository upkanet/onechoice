@extends('layouts.master')

@section('title')
Dashboard
@stop



@section('content')
	<div class="col-lg-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Categories</h3>
			</div>
			<div class="panel-body">
				@foreach ($categories as $item)
				{{ Form::radio('category', $item->id) }} {{ $item->name }}<br>
				@endforeach
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></a> 
				<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus"></span></a> 
				<a href="#" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Connectors</h3>
			</div>
			<div class="panel-body" id="connectors_list">
				&nbsp;
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></a> 
				<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus"></span></a> 
				<a href="#" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
			</div>
		</div>
	</div>
	<div class="col-lg-1">
		<a href="#" class="btn btn-primary">Load </a>
	</div>
@stop