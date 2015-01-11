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
					<li{{ Request::is('/') ? ' class="active"' : '' }}><a href="{{ asset('') }}">All</a></li>
					@foreach($rooms as $room)
					<li{{ Request::is('room/'.$room->permalink) ? ' class="active"' : '' }}><a href="{{ asset('room/'.$room->permalink) }}">{{ $room->name }}</a></li>
					@endforeach
				</ul>
				<form class="navbar-form navbar-right">
				  <input type="hidden" name="current_room_id" value="{{ $current_room_id }}">
			      <input type="text" class="form-control col-lg-8" placeholder="Search" id="searchInput" OnKeyup="searchProduct('{{ asset('') }}')">
			    </form>
			</div>
		</nav>
		@if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@elseif(Session::has('fail'))
			<div class="alert alert-danger">{{ Session::get('fail') }}</div>
		@elseif(Session::has('info'))
			<div class="alert alert-info">{{ Session::get('info') }}</div>
		@endif
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