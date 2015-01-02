@extends('layouts.master')

@section('title')
Dashboard
@stop

@section('css')
	@parent
	{{ HTML::style('css/dashboard.css') }}
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
				<h3 class="panel-title">Connectors for the category</h3>
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Products listed in category</h3>
			</div>
			<div class="panel-body" id="products_list_cat">

			</div>
			<div class="panel-footer">
				<a href="javascript:activateProduct();" class="btn btn-warning btn-block">Activate</a>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<a href="#" class="btn btn-primary btn-block" id="loadProdListBtn">Load</a><br>
		<br>
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
	<div class="col-lg-6">
		@include('dashboard.create_product')
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
	{{ HTML::script('js/jquery.cropit.min.js') }}
@stop