<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create new product</h3>
		</div>
	{{Form::open(['url' => 'dashboard/products/store', 'method' => 'post', 'id' => 'createProductForm', 'name' => 'create_product'])}}
		{{Form::hidden('category_id','')}}
		<div class="panel-body">
			<div class="col-lg-6">
				<div class="form-group">
					<a href="#" id="googleLink" class="btn btn-info btn-block" target="_new">Google It</a>
				</div>
				<div class="form-group">
					{{Form::text('name','', array('class' => 'form-control', 'placeholder' => 'Name', 'id' => 'productName'))}}
				</div>
				<div class="form-group">
					{{Form::text('permalink','', array('class' => 'form-control', 'placeholder' => 'permalink', 'OnFocus' => 'generatePermalink(this)'))}}
				</div>
				<div class="form-group" id="imgform">
					{{Form::label('product_img', 'Product image')}}
					<div class="image-editor">
						<input type="file" class="cropit-image-input custom-file-input">
						<div class="cropit-image-preview"></div>
						<div class="slider">
							<span class="glyphicon glyphicon-picture" style="font-size:12px;"></span> <input type="range" class="cropit-image-zoom-input"> <span class="glyphicon glyphicon-picture" style="font-size:18px;"></span>
						</div>
						{{Form::hidden('imgdata','')}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('merchant', 'Merchant')}}
					{{Form::text('merchant_name','', array('class' => 'form-control', 'placeholder' => 'Merchant Name'))}}
					{{Form::text('merchant_link','', array('class' => 'form-control', 'placeholder' => 'Merchant Link'))}}
				</div>
			</div>
			<div class="col-lg-6">
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
				<div class="form-group">
					{{Form::label('articles', 'Articles')}}
					{{Form::text('art1','', array('class' => 'form-control', 'placeholder' => 'Article #1'))}}
					{{Form::text('art1_url','', array('class' => 'form-control', 'placeholder' => 'url'))}}
					<br>
					{{Form::text('art2','', array('class' => 'form-control', 'placeholder' => 'Article #2'))}}
					{{Form::text('art2_url','', array('class' => 'form-control', 'placeholder' => 'url'))}}
					<br>
					{{Form::text('art3','', array('class' => 'form-control', 'placeholder' => 'Article #3'))}}
					{{Form::text('art3_url','', array('class' => 'form-control', 'placeholder' => 'url'))}}
				</div>
			</div>
		</div>
	{{Form::close()}}
	<div class="panel-footer">
		<a href="#" class="btn btn-primary btn-block" id="createProductSend">Create</a> 
	</div>
</div>