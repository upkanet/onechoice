<div class="container">
	<div class="input-group input-group-lg">
		<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="{{Lang::get('messages.searchengine')}}" aria-describedby="sizing-addon1" id="searchInput" OnKeyup="searchProduct('{{ asset('') }}')">
	</div>
	<input type="hidden" name="current_room_id" value="{{ $current_room_id }}">
</div>