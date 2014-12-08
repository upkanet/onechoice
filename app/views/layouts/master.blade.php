<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		@section('css')
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		@show
		<title></title>
	</head>
	<body>
		<h1></h1>
		@yield('content')

		@section('jscript')
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		@show
	</body>
</html>