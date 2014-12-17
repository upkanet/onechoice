
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
	console.log(selConList);
}
$("#loadProdListBtn").click(getSelectedConnectors);