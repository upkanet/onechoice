{{ Form::open(array('url' => 'dashboard/connectors/store', 'method' => 'post', 'name' => 'add_connector', 'role' => 'form', 'id' => 'add_connector')) }}
{{ Form::hidden('category_id',$category_id) }}
<div class="form-group">
	{{Form::label('name','Name :')}}
	{{Form::text('name','', array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('prod_list_url', 'Products List URL :')}}
{{Form::text('prod_list_url','', array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('prod_list_code', 'Product List Code :')}}
{{Form::textarea('prod_list_code','', array('class' => 'form-control', 'size' => '30x5'))}}
</div>
<div class="form-group">
{{Form::label('prod_name_code', 'Product Name Code :')}}
{{Form::textarea('prod_name_code','', array('class' => 'form-control', 'size' => '30x5'))}}
</div>
<div class="form-group">
{{Form::label('prod_price_code','Product Price Code :')}}
{{Form::textarea('prod_price_code','', array('class' => 'form-control', 'size' => '30x5'))}}
</div>
<div class="form-group">
{{Form::label('prod_rating_code','Product Rating Code :')}}
{{Form::textarea('prod_rating_code','', array('class' => 'form-control', 'size' => '30x5'))}}
</div>
{{Form::close()}}