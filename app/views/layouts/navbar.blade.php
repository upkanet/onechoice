<nav class="navbar navbar-lonegood" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::route('home') }}">
				<img src="{{ asset('img/logo.png') }}" alt="Lone Good"/>
			</a>
		</div>
		<ul class="nav navbar-nav">
			<li{{ Request::is('/') ? ' class="active"' : '' }}><a href="{{ asset('') }}">{{Lang::get('messages.all_products')}}</a></li>
			@foreach($rooms as $room)
			<li{{ Request::is('room/'.$room->permalink) ? ' class="active"' : '' }}><a href="{{ asset('room/'.$room->permalink) }}">{{ $room->name }}</a></li>
			@endforeach
		</ul>
		@yield('navbar-searchengine')
	</div>
</nav>