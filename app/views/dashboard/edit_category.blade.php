{{Form::open(['url' => 'categories/'.$category->id, 'method' => 'put', 'name' => 'edit_category','files' => true])}}
<div class="form-group">
	{{Form::text('name',$category->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
	{{Form::text('permalink',$category->permalink,['class' => 'form-control', 'placeholder' => 'Permalink'])}}
</div>
<div class="form-group">
	{{Form::file('img',['class' => 'custom-file-input', 'OnChange' => 'showCategoryUploadImg(this);'])}}
	<p class="text-center"><img id="categoryImgPreview" width="560" src="{{ $category->img_path }}" alt="your image" /></p>
</div>
{{Form::close()}}