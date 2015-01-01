@extends('layouts.master')

@section('title')
Dashboard
@stop



@section('content')
	<div class="col-lg-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Categories</h3>
			</div>
			<div class="panel-body">
				@foreach ($categories as $item)
				{{ Form::radio('category', $item->id) }} {{ $item->name }}<br>
				@endforeach
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></a> 
				<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus"></span></a> 
				<a href="#" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Connectors</h3>
			</div>
			<div class="panel-body">
				<select name="connectors" multiple class="form-control"  id="connectors_list">
				</select>
			</div>
			<div class="panel-footer">
				<a href="javascript:createConnector();" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></a> 
				<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus"></span></a> 
				<a href="javascript:editConnector();" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
			</div>
		</div>
	</div>
	<div class="col-lg-1">
		<a href="#" class="btn btn-primary" id="loadProdListBtn">Load </a>
	</div>
	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Products List</h3>
			</div>
			<div class="panel-body" id="products_list">
	
			</div>
			<div class="panel-footer">
				&nbsp;
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Product</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					{{Form::text('name','', array('class' => 'form-control', 'placeholder' => 'Name', 'id' => 'productName'))}}
				</div>
				<div class="form-group">
					<a href="#" id="googleLink" class="btn btn-primary" target="_new">Google It !</a>
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
			<div class="panel-footer">
				<a href="#" class="btn btn-primary">Set</a> 
			</div>
		</div>
	</div>

	<!-- Dashboard Modal -->
	<div class="modal fade" id="dashboardModal" tabindex="-1" role="dialog" aria-labelledby="dashboardModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="dashboardModalLabel"></h4>
	      </div>
	      <div class="modal-body" id="dashboardModalBody">
	      </div>
	      <div class="modal-footer" id="dashboardModalFooter">
	      </div>
	    </div>
	  </div>
	</div>
@stop

@section('jscript')
	@parent
	{{ HTML::script('js/dashboard.js') }}
@stop