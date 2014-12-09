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
					<a class="navbar-brand" href="#">OneChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="#">Living Room</a></li>
					<li><a href="#">Kitchen</a></li>
					<li><a href="#">Nomade</a></li>
				</ul>
			</div>
		</nav>
		@yield('content')

		@section('jscript')
		{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}
		@show
	</body>
</html>