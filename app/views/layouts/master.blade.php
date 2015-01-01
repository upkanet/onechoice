<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		@section('css')
		{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
		@show
		<title>@yield('title')</title>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ URL::route('home') }}">OneChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="#">Living Room</a></li>
					<li><a href="#">Kitchen</a></li>
					<li><a href="#">Nomade</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
						<li><a href="{{ URL::route('getLogin') }}">Admin</a></li>
					@else
						<li><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
						<li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
					@endif
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
			LoneGood 2015
		</div>


		@section('jscript')
		{{ HTML::script('//code.jquery.com/jquery-2.1.2.min.js') }}
		{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}
		@show
	</body>
</html>