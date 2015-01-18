{{Form::open(['url' => 'rooms/'.$room->id, 'method' => 'put', 'name' => 'edit_room'])}}
<div class="form-group">
	{{Form::text('name',$room->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink',$room->permalink,['class' => 'form-control', 'placeholder' => 'Permalink', 'OnFocus' => 'createRoomPermalink(this)'])}}
</div>
<div class="row">
	<div class="col-lg-12">
		<h4>Linked Categories</h4>
		<div class="form-control scroll-checkbox">
			@foreach($all_categories as $category)
			<input name="room_categories[]" type="checkbox" value="{{$category->id}}" <?php echo (in_array($category->id,$room_categories ) ? 'checked="checked"' : ''); ?>> {{$category->name}}<br>
			@endforeach
		</div>
	</div>
</div>
{{Form::close()}}