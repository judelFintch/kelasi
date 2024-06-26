$(function(){
	//execution de script
	$('.qteRow').hide();
	showQteInput();
           function showQteInput(){
       	$('.comptable').change(function(){
       		var type=$('.comptable').val();
       		  if (type==true) {
       		  	 $('.qteRow').show();

       		  }
       		  else{
       		  	$('.qteRow').hide();

       		  }
       	});
   }

   $('.btnValiderUpdateArt').click(function(){
   	var idArt=$('.articleId').val();
   	var qte=$('.qteAppro').val();
    var comptable=$('.comptable').val();
   	  if (qte>0){
   	  	$.post("php/__updateStockArticle.php",{idArt:idArt,qte:qte,approQte:true,comptable:comptable},function(data){if(data==true){var qte=$('.qteAppro').val('');$('.messageRetrour').empty().addClass('alert alert-success').append('Operation reussi')}});
   	  }
   	  else{
   	  	    alert('la quantite de ne peux etre inferieur ou egale a 0');
   	  }
   	    

   });




})