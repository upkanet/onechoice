function searchProduct(rootDir){
	var q = $('#searchInput').val();
	var r = $('input[name=current_room_id]').val();

	if('r' == null){
		r = 0;
	}
	if(q!=''){
		$.get(rootDir+'search/'+r+'/'+q,{},function(data){
			var target = $('#content');
			target.html('').append('<div class="container-fluid"><div class="grid" id="searchThumb"></div></div>');
			data.forEach(function(element,index,array){
				thumb = '<figure class="effect-steve"><img src="' + element.pImg + '" width="480" alt="' + element.pName + '"><figcaption><h2>' + element.cName + '</h2><p>' + element.pName + '</p><a href="' + element.cLink + '/' + element.pLink + '">View more</a></figcaption></figure>';
				$('#searchThumb').append(thumb);
			});
		},'json');
	}
};