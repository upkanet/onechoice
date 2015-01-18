{{Form::open(['url' => 'rooms', 'method' => 'post', 'name' => 'create_room'])}}
<div class="form-group">
	{{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink','',['class' => 'form-control', 'placeholder' => 'Permalink', 'OnFocus' => 'generatePermalink(this)'])}}
</div>
<div class="row">
	<div class="col-lg-12">
		<h4>Linked Categories</h4>
		<div class="form-control scroll-checkbox">
			@foreach($all_categories as $category)
			<input name="room_categories[]" type="checkbox" value="{{$category->id}}"> {{$category->name}}<br>
			@endforeach
		</div>
	</div>
</div>
{{Form::close()}}