$(function(){
   //hide <div>
    $('.textResultat').hide();
    $('.detailsFacture').hide();
    $('.btnValider').hide();
    $('.recept_code').hide();
  function verificationVariable(variable){
  	 /*if(variable!='' && variable!=0){
  	 	return true;
  	 }
  	 else{
  	 	return false;
  	 	alert('Information erronnee');
  	 }*/
  }
 function rechercheFacture(codefacture){
  	  //ouverture de la requette asynchrone 
  	   $.post('php/__affichage_facture.php',{codefacture:codefacture},function(resultatFacture){  
  	   	   if(resultatFacture==0){
  	   	   	 $('.textResultat').removeClass('alert-success').show().empty().addClass('alert alert-danger').append('Aucune Correspondance dans la base');
  	   	   	 $('.detailsFacture').empty();
  	   	   	  $('.btnValider').hide();
  	   	   }
  	   	   else{
  	   	     $('.detailsFacture').empty().append(resultatFacture);
  	   	     $('.detailsFacture').show();
  	   	     $('.textResultat').removeClass('alert-danger').empty().show().addClass('alert alert-success').append('Resultat de la recherche pour la facture '+ codefacture);
             $('.btnValider').show();
             $('.recept_code').empty().append(codefacture);

            }
  	   });
  }
//traitement de la facture
$('.codefact').keyup(function(){
          var codefacture=$('.codefact').val();
          rechercheFacture(codefacture);
  });
//suppression de la facture
$('.btnValider').click(function(e){
	//e.eventDefault();
	 var codefacture=$('.recept_code').html();
	 //envois du code facture a supprmer
	  $.post('php/__suppression_facture.php',{codefacture:codefacture,operation:true},function(statusOperation){
      if(statusOperation==true){
        $('.textResultat').removeClass('alert-danger').empty().show().addClass('alert alert-success').append('Operation reussie');
         $('.detailsFacture').hide();
         $('.btnValider').hide();
         $('.recept_code').hide();
         $('.codefact').val('');
           if(statusOperation==true){
             $('.detailsFacture').hide();
             $('.btnValider').hide();
             $('.recept_code').hide();
             $('.textResultat').removeClass('alert-danger').empty().show().addClass('alert alert-success').append('Operation reussie');
          }
          if(statusOperation==false){
             $('.detailsFacture').hide();
             $('.btnValider').hide();
             $('.recept_code').hide();
             $('.textResultat').removeClass('alert-success').empty().show().addClass('alert alert-danger').append('Echec de l\'opertaion');

          }
       }
	  });
   })
}); 


  