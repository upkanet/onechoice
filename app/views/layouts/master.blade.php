<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
		@section('css')
		{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
		{{ HTML::style('css/main.css') }}
		@show
		<title>LoneGood - @yield('title')</title>
	</head>
	<body>
		@include('layouts.navbar', ['rooms' => $rooms, 'current_room_id' => $current_room_id])
		@if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@elseif(Session::has('fail'))
			<div class="alert alert-danger">{{ Session::get('fail') }}</div>
		@elseif(Session::has('info'))
			<div class="alert alert-info">{{ Session::get('info') }}</div>
		@endif
		@yield('searchengine')
		<div id="content">
			@yield('content')
		</div>
		<div class="container text-center">
			LoneGood 2015 | Environment : {{ App::environment() }} | <a href="{{ URL::route('dashboard') }}">Dashboard</a>
			@if(Auth::check())
			| <a href="{{ URL::route('getLogout') }}">Logout</a>
			@endif
		</div>


		@section('jscript')
		{{ HTML::script('//code.jquery.com/jquery-2.1.2.min.js') }}
		{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}
		{{ HTML::script('js/main.js') }}
		@show
	</body>
</html>