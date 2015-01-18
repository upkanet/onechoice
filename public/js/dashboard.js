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
function dashGetCategoryName(){
	return $('input[name=category]:checked').next('span').html();
}
function dashGetConnectorId(){
	return $("#connectors_list option:selected").val();
}
function dashGetConnectorName(){
	return $("#connectors_list option:selected").html();
}
function dashGetProductId(){
	return $("input[name=product_activate]:checked").val();
}
var closeButton = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
function dashButton(style, f, txt){
	return '<button type="button" class="btn btn-' + style + '" OnClick="' + f + '()">' + txt + '</button>';
}
function generatePermalink(obj){
	var formName = $(obj).parents('form').attr('name');
	if($(obj).val() == ''){
		$(obj).val($('form[name=' + formName + '] input[name=name]').val().replace(/\s+/g, '-').toLowerCase());
	}
}
function dashGetConnectors(){
	var selCon = $("select[name='connectors'] option:selected");
	var selConList = [];
	selCon.each(function(index){
		selConList[index] = $( this ).val();
	});
	return selConList.join();
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

//Categories
function createCategory(){
	var btnCreateCat = closeButton + dashButton('primary','storeCategory','Add');
	$.get('categories/create', function(data){
		setDashboardModal('Create Category', data, btnCreateCat);
	});
	$('#dashboardModal').modal('toggle');
}
function storeCategory(){
	dashSubmitForm('create_category');
}
function editCategory(){
	var catId = dashGetCategoryId();
	var btnEditCat = closeButton + dashButton('primary', 'updateCategory','Update');
	if(catId == undefined){
		alert('Please select a Category to edit.');
		return false;
	}
	else{
		$.get('categories/'+catId+'/edit', function(data){
			setDashboardModal('Edit Category', data, btnEditCat);
		});
		$('#dashboardModal').modal('toggle');
		return true;
	}
}
function updateCategory(){
	dashSubmitForm('edit_category');
}
function deleteCategory(){
	var catName = dashGetCategoryName();
	var btnDelete = dashButton('danger','destroyCategory','Delete');
	if(catName == undefined){
		alert('Please select a Category to delete.');
		return false;
	}
	else{
		setDashboardModal('Delete Category', 'Would you like to delete '+catName+' ?', btnDelete);
		$('#dashboardModal').modal('toggle');
		return true;
	}
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
$("input[name='category']").click(loadCategoryElements);

function loadCategoryElements(){
	var catId = dashGetCategoryId();
	$.get('dashboard/connectors/'+catId, function(data){
		$("#connectors_list").html(data);
	});

	$.get('dashboard/products_by_cat/'+catId, function(data){
		$("#products_list_cat").html(data);
	});
}

//Connectors
function createConnector(){
	var catId = dashGetCategoryId();
	var btnAdd = closeButton + dashButton('primary','storeConnector','Add');
	if(catId == undefined){
		alert('Please select a Category.')
		return false;
	}
	else{
		$.get('dashboard/connectors/create?category_id='+catId, function(data){
			setDashboardModal('Create Connector for '+dashGetCategoryName(), data, btnAdd);
			$('#dashboardModal').modal('toggle');
		});
		return true;
	}
}
function storeConnector(){
	$('#createConnector').submit();
}
function editConnector(){
	var connId = dashGetConnectorId();
	var btnCreate = closeButton + dashButton('primary','updateConnector','Update');
	if(connId == undefined){
		alert('Please select a Connector to edit.');
		return false;
	}
	else{
		$.get('dashboard/connectors/'+connId+'/edit', function(data){
			setDashboardModal('Edit Connector', data, btnCreate);
			$('#dashboardModal').modal('toggle');
		});
		return true;
	}
}
function updateConnector(){
	$('#editConnector').submit();
}
function deleteConnector(){
	var connName = dashGetConnectorName();
	var catName = dashGetCategoryName();
	var btnDelete = dashButton('danger','destroyConnector','Delete');
	if(connName == undefined){
		alert('Please select a Connector to delete.');
		return false;
	}
	else{
		setDashboardModal('Delete Connector for ' + catName, 'Would you like to delete '+connName+' from ' + catName + ' ?', btnDelete);
		$('#dashboardModal').modal('toggle');
		return true;
	}
}
function destroyConnector(){
	var connId = dashGetConnectorId();
	$.ajax({
		url: 'dashboard/connectors/'+connId,
		type: 'DELETE',
		success: function(msg){
			location.reload();
		}
	});
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
			$.get('dashboard/connectors/'+connId+'/tryit',function(data){
				$("#testConnector").html(data);
			})
			.fail(function(xhr, ajaxOptions, thrownError){
				$("#testConnector").html('<h3>Error</h3><p>'+xhr.status+'</p><br><p>'+thrownError+'</p>');
			});
		}
	});
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
			loadCategoryElements();
			setDashboardModal('Activate Product','Activated',closeButton);
		}
		else{
			alert('Error while activating product');
		}
	}, 'json');	
}

//Connectors to Product List
function listProducts(){
	rconnector_list = dashGetConnectors();

	$("#loadProdListBtn").html("<span class=\"glyphicon glyphicon-refresh\"></span>");

	$.get('dashboard/products/'+rconnector_list,function(data){
		$("#products_list").html(data);
		$("#loadProdListBtn").text("Load");
	})
		.fail(function(){
			$("#products_list").html('Error');
		});
}

//Product
function selectProd(name){
	$('#productName').val(name);
}
function searchProdArticles(){
	var q = $('#productName').val();
	window.open('http://www.google.com/#q='+q);
}
function searchProdImage(){
	var q = $('#productName').val();
	window.open('http://www.google.com/search?tbm=isch&q='+q);
}
function searchProdMerchant(){
	var q = $('#productName').val();
	window.open('http://www.amazon.fr/s/?field-keywords='+q);
}

//Image
$(function() {
	$('.image-editor').cropit();
});

$('#createProductSend').click(createProduct);

function createProduct(){
	var catId = dashGetCategoryId();

	if(catId == undefined){
		alert('Please select a Category');
	}
	else{
		var img = $('.image-editor').cropit('export');
		$('input[name=category_id]').val(catId);
		$('input[name=imgdata]').val(img);
		$('#createProductForm').submit();
	}
}