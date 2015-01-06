<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		@section('css')
		{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
		{{ HTML::style('css/main.css') }}
		@show
		<title>@yield('title')</title>
	</head>
	<body>
		<nav class="navbar navbar-lonegood" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ URL::route('home') }}">
						<img src="{{ asset('img/logo.png') }}" alt="Lone Good"/>
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">All</a></li>
					@foreach($rooms as $room)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $room->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							@foreach($room->categories as $category)
							<li><a href="{{ $category->permalink }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</li>
					@endforeach
				</ul>
			</div>
		</nav>
		@if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@elseif(Session::has('fail'))
			<div class="alert alert-danger">{{ Session::get('fail') }}</div>
		@elseif(Session::has('info'))
			<div class="alert alert-info">{{ Session::get('info') }}</div>
		@endif
		@yield('content')

		<div class="container text-center">
			LoneGood 2015 | Environment : {{ App::environment() }} | <a href="{{ URL::route('dashboard') }}">Dashboard</a>
			@if(Auth::check())
			| <a href="{{ URL::route('getLogout') }}">Logout</a>
			@endif
		</div>


		@section('jscript')
		{{ HTML::script('//code.jquery.com/jquery-2.1.2.min.js') }}
		{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}
		@show
	</body>
</html>