{{Form::open(['url' => 'categories/'.$category->id, 'method' => 'put', 'name' => 'edit_category'])}}
<div class="form-group">
	{{Form::text('name',$category->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink',$category->permalink,['class' => 'form-control', 'placeholder' => 'Permalink'])}}
</div>
{{Form::close()}}