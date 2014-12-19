<select name="connectors" multiple class="form-control">
@if(count($connectors) == 0)
	<option value=""  disabled><i>No connector</i></option>
@endif
@foreach($connectors as $connector)
	<option value="{{ $connector->id }}">{{ $connector->name }}</option>
@endforeach
</select>