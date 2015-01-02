
//Category to Connectors and Products List
$("input[name='category']").click(function(){
	var catId = $("input[name='category']:checked").val();
	$.get('dashboard/connectors/'+catId, function(data){
		$("#connectors_list").html(data);
	});

	$.get('dashboard/products_by_cat/'+catId, function(data){
		$("#products_list_cat").html(data);
	});

});

//Connectors to Product List
function getSelectedConnectors(){
	var selCon = $("select[name='connectors'] option:selected");
	var selConList = [];
	selCon.each(function(index){
		selConList[index] = $( this ).val();
	});
	return selConList.join();
}
function listProducts(){
	rconnector_list = getSelectedConnectors();

	$("#loadProdListBtn").html("<span class=\"glyphicon glyphicon-refresh\"></span>");

	$.get('dashboard/products/'+rconnector_list,function(data){
		$("#products_list").html(data);
		$("#loadProdListBtn").text("Load");
	});
}
$("#loadProdListBtn").click(listProducts);
function createConnector(){
	var catId = $("input[name='category']:checked").val();
	if(typeof catId === 'undefined') catId = '';
	var btnAdd = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="storeConnector()">Add</button>';

	if(catId != ''){
		$.get('dashboard/connectors/create?category_id='+catId, function(data){
			setDashboardModal('Create Connector', data, btnAdd);
		});
	}
	else {setDashboardModal('Create Connector', 'First select a category', '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');}
	$('#dashboardModal').modal('toggle');
}
function storeConnector(){
	$('#createConnector').submit();
}
function editConnector(){
	var connId = $("#connectors_list option:selected").val();
	if(typeof connId === 'undefined') connId = '';
	var btnCreate = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="updateConnector()">Update</button>';

	if(connId != ''){
		$.get('dashboard/connectors/'+connId+'/edit', function(data){
			setDashboardModal('Edit Connector', data, btnCreate);
		});
	}
	else {setDashboardModal('Edit Connector', 'First select a connector', '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');}
	$('#dashboardModal').modal('toggle');
}
function updateConnector(){
	$('#editConnector').submit();
}
//Activate
function activateProduct(){
	var prodId = $("input[name=product_activate]:checked").val();
	console.log(prodId);
}

//modal
function setDashboardModal(title, body, footer){
	$('#dashboardModalLabel').html(title);
	$('#dashboardModalBody').html(body);
	$('#dashboardModalFooter').html(footer);
}

//Product
function selectProd(name){
	$('#productName').val(name);
	$('#googleLink').prop("href", 'https://www.google.fr/#q='+name);
}

//Permalink
$('input[name=permalink]').click(function(){
	if($(this).val() == ''){
		$(this).val($('#productName').val().replace(/\s+/g, '-').toLowerCase());
	}
});

//Image
$(function() {
	$('.image-editor').cropit();
});

$('#createProductSend').click(function(){
	var catId = $("input[name='category']:checked").val();
	var img = $('.image-editor').cropit('export');
	$('input[name=category_id]').val(catId);
	$('input[name=imgdata]').val(img);
	$('#createProductForm').submit();	
});