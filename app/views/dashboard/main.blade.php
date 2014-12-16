@extends('layouts.master')

@section('title')
Dashboard
@stop


@section('content')
	<div class="list-group col-lg-3">
		@foreach ($categories as $item)
		<a href="?cat={{$item->id}}" class="list-group-item">{{$item->name}}</a>
		@endforeach
	</div>
	<div>
		{{ $rconnector->name }}
	</div>
@stop