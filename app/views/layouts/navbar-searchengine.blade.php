<form class="navbar-form navbar-right">
  <input type="text" class="form-control col-lg-8" placeholder="Search" id="searchInput" OnKeyup="searchProduct('{{ asset('') }}')">
  <input type="hidden" name="current_room_id" value="{{ $current_room_id }}">
</form>