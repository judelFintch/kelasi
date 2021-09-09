$(function(){
	$('.search_oder_frais').keyup(function(){
		var keydownSearch=$('.search_oder_frais').val();
		//ouveture d'une requette asynchrone
		$.post("php/__search_autres.php",{searchGet:keydownSearch},function(data){
			$('.dataSearch').html(data);
		});
	})
})