<select name="connectors" multiple class="form-control">
@if(count($connectors) == 0)
	<option><em>No connector</em></option>
@endif
@foreach($connectors as $connector)
	<option value="{{ $connector->id }}">{{ $connector->name }}</option>
@endforeach
</select>