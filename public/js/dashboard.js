
//Category to Connectors
$("input[name='category']").click(function(){
	var catId = $("input[name='category']:checked").val();
	$.get('dashboard/connectors/'+catId, function(data){
		$("#connectors_list").html(data);
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
	$.get('dashboard/products/'+rconnector_list,function(data){
		$("#products_list").html(data);
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

//modal
function setDashboardModal(title, body, footer){
	$('#dashboardModalLabel').html(title);
	$('#dashboardModalBody').html(body);
	$('#dashboardModalFooter').html(footer);
}