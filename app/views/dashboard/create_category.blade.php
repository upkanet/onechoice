{{Form::open(['url' => 'categories', 'method' => 'post', 'name' => 'create_category'])}}
<div class="form-group">
	{{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink','',['class' => 'form-control', 'placeholder' => 'Permalink'])}}
</div>
{{Form::close()}}