@extends('layouts.master')

@section('title')
Login Form
@stop


@section('content')
<div class="container">
	<h1>Admin</h1>
	{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			{{ Form::text('email', $value = null, array('placeholder' => 'eMail', 'class'=> 'form-control', 'required' => 'required', 'autofocus' => 'autofocus')) }}
		</div>
		<div class="form-group">
		{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
		</div>
		<div class="form-group">
		{{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
		</div>
	{{ Form::close() }}
</div>
@stop