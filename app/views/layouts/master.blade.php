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
						{{ HTML::image('img/logo.png') }}
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Active</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Dropdown header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
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