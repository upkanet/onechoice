function searchProduct(rootDir){
	var q = $('#searchInput').val();
	var room = $('input[name=current_room_id]').val();
	if('room' == null){room = 0;}

	getSearchResult(rootDir,q,room).success(function(data){
		var resultDiv = $('#content');
		var htmlResult = "";
		data.forEach(function(element,index,array){
			htmlResult += '<figure class="effect-steve"><img src="' + element.pImg + '" width="480" alt="' + element.pName + '"><figcaption><h2>' + element.cName + '</h2><p>' + element.pName + '</p><a href="' + element.cLink + '/' + element.pLink + '">View more</a></figcaption></figure>';
		});
		resultDiv.html('<div class="container-fluid"><div class="grid" id="searchThumb"></div></div>');
		var searchThumb = $('#searchThumb');
		searchThumb.append(htmlResult);
	});
}

function getSearchResult(rootDir,q,room){
	return $.ajax({
		url: rootDir+'search/'+room,
		type: 'GET',
		data: {'q': q},
		dataType: 'json'
	});
}