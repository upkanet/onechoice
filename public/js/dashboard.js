
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
function addConnector(){
	var catId = $("input[name='category']:checked").val();
	if(typeof catId === 'undefined') catId = '';
	var btnAdd = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="sendConnector()">Add</button>';

	if(catId != ''){
		$.get('dashboard/connectors/create?category_id='+catId, function(data){
			setDashboardModal('Add connector', data, btnAdd);
		});
	}
	else {setDashboardModal('Add connector', 'First select a category', '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');}
	$('#dashboardModal').modal('toggle');
}
function sendConnector(){
	$('#add_connector').submit();
}

//modal
function setDashboardModal(title, body, footer){
	$('#dashboardModalLabel').html(title);
	$('#dashboardModalBody').html(body);
	$('#dashboardModalFooter').html(footer);
}