//Shared functions
function dashSubmitForm(formName){
	$('form[name='+formName+']').submit();
}
function dashGetCategoryId(){
	return $("input[name='category']:checked").val();
}
function dashGetConnectorId(){
	return $("#connectors_list option:selected").val();
}
//modal
function setDashboardModal(title, body, footer){
	$('#dashboardModalLabel').html(title);
	$('#dashboardModalBody').html(body);
	$('#dashboardModalFooter').html(footer);
}

//Categories
function createCategory(){
	var btnCreateCat = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="storeCategory()">Add</button>';
	$.get('categories/create', function(data){
		setDashboardModal('Create Category', data, btnCreateCat);
	});
	$('#dashboardModal').modal('toggle');
}
function storeCategory(){
	dashSubmitForm('create_category');
}
function destroyCategory(){
	if(confirm('Do you really want to delete this Category ?'))
	{
		if(confirm('This could delete a lot of articles. Still sure ?'))
		{
			var catId = dashGetCategoryId();
			$.ajax({
				url: 'categories/'+catId,
				type: 'DELETE',
				success: function(msg){
					location.reload();
				}
			});
		}
	}
}
function editCategory(){
	//var catId = $("input[name='category']:checked").val();
	var catId = dashGetCategoryId();
	$.get('categories/'+catId+'/edit', function(data){
		var btnEditCat = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="updateCategory()">Update</button>';
		setDashboardModal('Edit Category', data, btnEditCat);
	});
	$('#dashboardModal').modal('toggle');
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
	var connId = dashGetConnectorId();
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
	var prodId = $("input[name=product_activate]:checked").val();
	
	var btnActivate = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" OnClick="activateProductSend(' + prodId + ')">Activate</button>';

	$.get('dashboard/activate/'+prodId, function(data){
		setDashboardModal('Activate Product',data,btnActivate);
	});
	$('#dashboardModal').modal('toggle');
}
function activateProductSend(prodId){
	$.post('dashboard/activate/'+prodId, function(data){
		if(data['success']){
			setDashboardModal('Activate Product','Activated','<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
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