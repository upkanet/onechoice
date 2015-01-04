{{Form::open(['url' => 'categories', 'method' => 'post', 'name' => 'create_category','files' => true])}}
<div class="form-group">
	{{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink','',['class' => 'form-control', 'placeholder' => 'Permalink'])}}
</div>
<div class="form-group">
	{{Form::file('img',['class' => 'custom-file-input', 'OnChange' => 'showCategoryUploadImg(this);'])}}
	<p class="text-center"><img id="categoryImgPreview" width="560" src="http://placehold.it/560x150" alt="your image" /></p>
</div>
{{Form::close()}}