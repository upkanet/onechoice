<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Product</h3>
		</div>
	{{Form::open(['url' => 'dashboard/products/store', 'method' => 'post', 'id' => 'createProductForm'])}}
		{{Form::hidden('category_id','')}}
		<div class="panel-body">
			<div class="form-group">
				<a href="#" id="googleLink" class="btn btn-primary" target="_new">Google It</a>
			</div>
			<div class="form-group">
				{{Form::text('name','', array('class' => 'form-control', 'placeholder' => 'Name', 'id' => 'productName'))}}
			</div>
			<div class="form-group">
				{{Form::text('permalink','', array('class' => 'form-control', 'placeholder' => 'permalink'))}}
			</div>
			<div class="form-group" id="imgform">
				{{Form::label('product_img', 'Product image')}}
				<div class="image-editor">
					<input type="file" class="cropit-image-input">
					<div class="cropit-image-preview"></div>
					<div class="image-size-label">
						resize
					</div>
					<input type="range" class="cropit-image-zoom-input">
					{{Form::hidden('imgdata','')}}
				</div>
			</div>
			<div class="form-group">
				{{Form::label('arguments', 'Arguments')}}
				{{Form::text('argument1','', array('class' => 'form-control', 'placeholder' => 'Argument #1'))}}
				{{Form::text('argument2','', array('class' => 'form-control', 'placeholder' => 'Argument #2'))}}
				{{Form::text('argument3','', array('class' => 'form-control', 'placeholder' => 'Argument #3'))}}
				{{Form::text('argument4','', array('class' => 'form-control', 'placeholder' => 'Argument #4'))}}
				{{Form::text('argument5','', array('class' => 'form-control', 'placeholder' => 'Argument #5'))}}
				{{Form::text('argument6','', array('class' => 'form-control', 'placeholder' => 'Argument #6'))}}
				{{Form::text('argument7','', array('class' => 'form-control', 'placeholder' => 'Argument #7'))}}
			</div>
		</div>
	{{Form::close()}}
	<div class="panel-footer">
		<a href="#" class="btn btn-primary" id="createProductSend">Create</a> 
	</div>
</div>