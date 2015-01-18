//Shared functions
function dashSubmitForm(formName){
	$('form[name='+formName+']').submit();
}
function dashGetRoomId(){
	return $("input[name='room']:checked").val();
}
function dashGetCategoryId(){
	return $("input[name='category']:checked").val();
}
function dashGetConnectorId(){
	return $("#connectors_list option:selected").val();
}
function dashGetProductId(){
	return $("input[name=product_activate]:checked").val();
}
var closeButton = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
function dashButton(style, f, txt){
	return '<button type="button" class="btn btn-' + style + '" OnClick="' + f + '()">' + txt + '</button>';
}
//modal
function setDashboardModal(title, body, footer){
	$('#dashboardModalLabel').html(title);
	$('#dashboardModalBody').html(body);
	$('#dashboardModalFooter').html(footer);
}

//Rooms
function createRoom(){
	var btnCreateRoom = closeButton + dashButton('primary','storeRoom','Add');
	$.get('rooms/create', function(data){
		setDashboardModal('Create Room', data, btnCreateRoom);
	});
	$('#dashboardModal').modal('toggle');
}
function storeRoom(){
	dashSubmitForm('create_room');
}
function editRoom(){
	var roomId = dashGetRoomId();
	var btnEditRoom = closeButton + dashButton('primary', 'updateRoom','Update');
	if(roomId == undefined){
		alert('Please select a Room to edit.');
		return false;
	}
	else{
		$.get('rooms/'+roomId+'/edit', function(data){
			setDashboardModal('Edit Room', data, btnEditRoom);
		});
		$('#dashboardModal').modal('toggle');
		return true;
	}
}
function updateRoom(){
	dashSubmitForm('edit_room');
}
function deleteRoom(){
	var roomId = dashGetRoomId();
	console.log(roomId);
	if(roomId == undefined){
		alert('Please select a Room to delete.');
		return false;
	}
	else{
		var roomName = $('input[name=room]:checked').next('span').html();
		var btnDelete = dashButton('danger','destroyRoom','Delete');
		setDashboardModal('Delete Room', 'Would you like to delete ' + roomName + ' ?', btnDelete);
		$('#dashboardModal').modal('toggle');
		return true;
	}
}
function destroyRoom(){
	var roomId = dashGetRoomId();
	$.ajax({
		url: 'rooms/' + roomId,
		type: 'DELETE',
		success: function(msg){
			location.reload();
		}
	});
}
function createRoomPermalink(obj){
	if($(obj).val() == ''){
		$(obj).val($('form[name=create_room] input[name=name]').val().replace(/\s+/g, '-').toLowerCase());
	}
} 

//Categories
function createCategory(){
	var btnCreateCat = closeButton + dashButton('primary','storeCategory','Add');
	$.get('categories/create', function(data){
		setDashboardModal('Create Category', data, btnCreateCat);
	});
	$('#dashboardModal').modal('toggle');
}
function createCategoryPermalink(obj){
	if($(obj).val() == ''){
		$(obj).val($('form[name=create_category] input[name=name]').val().replace(/\s+/g, '-').toLowerCase());
	}
}
function storeCategory(){
	dashSubmitForm('create_category');
}
function deleteCategory(){
	var catName = $('input[name=category]:checked').next('span').html();
	var btnDelete = dashButton('danger','destroyCategory','Delete');
	setDashboardModal('Delete Category', 'Would you like to delete '+catName+' ?', btnDelete);
	$('#dashboardModal').modal('toggle');
}
function destroyCategory(){
	var catId = dashGetCategoryId();
	$.ajax({
		url: 'categories/'+catId,
		type: 'DELETE',
		success: function(msg){
			location.reload();
		}
	});
}
function editCategory(){
	var catId = dashGetCategoryId();
	$.get('categories/'+catId+'/edit', function(data){
		var btnEditCat = closeButton + dashButton('primary', 'updateCategory','Update');
		setDashboardModal('Edit Category', data, btnEditCat);
	});
	$('#dashboardModal').modal('toggle');
}
function editCategoryPermalink(obj){
	if($(obj).val() == ''){
		$(obj).val($('form[name=edit_category] input[name=name]').val().replace(/\s+/g, '-').toLowerCase());
	}
}
function updateCategory(){
	/*var form = $('form[name=edit_category]');
	form.submit();*/
	dashSubmitForm('edit_category');
}
function showCategoryUploadImg(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#categoryImgPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


//Category to Connectors and Products List
$("input[name='category']").click(function(){
	var catId = dashGetCategoryId();
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

//Connectors
function createConnector(){
	var catId = dashGetCategoryId();
	if(typeof catId === 'undefined') catId = '';
	var btnAdd = closeButton + dashButton('primary','storeConnector','Add');

	if(catId != ''){
		$.get('dashboard/connectors/create?category_id='+catId, function(data){
			setDashboardModal('Create Connector', data, btnAdd);
		});
	}
	else {setDashboardModal('Create Connector', 'First select a category', closeButton);}
	$('#dashboardModal').modal('toggle');
}
function storeConnector(){
	$('#createConnector').submit();
}
function editConnector(){
	var connId = dashGetConnectorId();
	if(typeof connId === 'undefined') connId = '';
	var btnCreate = closeButton + dashButton('primary','updateConnector','Update');

	if(connId != ''){
		$.get('dashboard/connectors/'+connId+'/edit', function(data){
			setDashboardModal('Edit Connector', data, btnCreate);
		});
	}
	else {setDashboardModal('Edit Connector', 'First select a connector', closeButton);}
	$('#dashboardModal').modal('toggle');
}
function updateConnector(){
	$('#editConnector').submit();
}
function testConnector(){
	var connId = dashGetConnectorId();
	var form = $('#editConnector');
	var datas = form.serialize();
	$.ajax({
		type: 'POST',
		url: form.attr('action'),
		data: datas,
		success: function(msg){
			$.get('dashboard/products/'+connId,function(data){
				$("#testConnector").html(data);
			});
		}
	});
}
function destroyConnector(){
	if(confirm('Do you really want to delete this Connector ?'))
	{
		if(confirm('This could delete the selected Connector. Still sure ?'))
		{
			var connId = dashGetConnectorId();
			$.ajax({
				url: 'dashboard/connectors/'+connId,
				type: 'DELETE',
				success: function(msg){
					location.reload();
				}
			});
		}
	}
}

//Activate
function activateProduct(){
	var prodId = dashGetProductId();
	var btnActivate = closeButton + dashButton('primary','activateProductSend','Activate');

	$.get('dashboard/activate/'+prodId, function(data){
		setDashboardModal('Activate Product',data,btnActivate);
	});
	$('#dashboardModal').modal('toggle');
}
function activateProductSend(){
	var prodId = dashGetProductId();
	$.post('dashboard/activate/'+prodId, function(data){
		if(data['success']){
			setDashboardModal('Activate Product','Activated',closeButton);
		}
		else{

		}
	}, 'json');	
}


//Product
function selectProd(name){
	$('#productName').val(name);
	$('#googleLink').prop("href", 'https://www.google.fr/#q='+name);
}

//Permalink
$('input[name=permalink]').focus(function(){
	if($(this).val() == ''){
		$(this).val($('#productName').val().replace(/\s+/g, '-').toLowerCase());
	}
});

//Image
$(function() {
	$('.image-editor').cropit();
});

$('#createProductSend').click(function(){
	var catId = dashGetCategoryId();
	var img = $('.image-editor').cropit('export');
	$('input[name=category_id]').val(catId);
	$('input[name=imgdata]').val(img);
	$('#createProductForm').submit();	
});