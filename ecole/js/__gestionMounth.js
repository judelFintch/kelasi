$(function(){
	//hide les information total
	   $('.total_panier').hide();
	   $('.btn-confirm').hide();
	  
	     var intialiser=$('.matricule_detail').val();
	       if(intialiser){
	       TotalPanier(intialiser);
	   }
function verificatonVariable(variable){
	if(variable==''){
		return false;
	}
	else{
		return true;
	}
}
   //function affichage les mois dans le combox
function affichageMoisEleve(matricule,annacad){
  	$.post('php/__affichageMoisCombox_tmp.php',{matricule:matricule,annacad:annacad},function(sendMatricule){
 		$(".mois").html(sendMatricule);
   			if(sendMatricule==0){
  				$('.appoint').hide();
   			}
  	});
 }
function venteArticle($libelle,qte,matricule){

} 
 //function affichant les frais unique dans le combox
 function affichageFraisUnique(matricule,annacad){
 	//ouverture d4 une requte asyncrone vers le php
 	$.post('php/__affichageUniqueFraisCombox_tmp.php',{matricule:matricule,annacad:annacad},function(fraisUnique){
 		$('.frais_unique').html(fraisUnique);
 		//alert(fraisUnique);
 		//$('.debug').html(fraisUnique);
 		
   });
 }
 function Elementempons(matricule){
  	$.post('php/__insertionMountfFromTablesTempon.php',{tmp:matricule},function(tmp){
  		  	$('.PanierMounth').empty().append(tmp);
  	});
 }
 //function affichage du total panier en USD et en CDF
 function TotalPanier(matricule){
 	//Affichage total
 	$('.total_panier').show();
 	$.post('php/__insertionMountfFromTablesTempon.php',{tmp_tt:matricule},function(tmp_tt){
 	if(tmp_tt!=0){
 		  Elementempons(matricule);
 	  	  $('.total_panier').empty().append(tmp_tt);
 	  	  $('.btn-confirm').show().fadeIn(500);
 	  	        	
  	  }
  	  else{
  	  	 $('.total_panier').hide();

  	  }
  	});
 }
 var matricule=$(".matricule_detail").val();
 var annee_acadenimique=$('.annacad').html();
 //execution de fonction d affichage
   affichageMoisEleve(matricule,annee_acadenimique);
   Elementempons(matricule);
   affichageFraisUnique(matricule,annee_acadenimique);
//Au clic du boton valider
$(".btnValider").click(function(){
	 //Affichger de la barre de telechargement 
		$("#loader").show();
		//Recuperation des elements du formulaire
		var mois=$(".mois").val();
		var matricule=$(".matricule_detail").val();
		var ChoixDevise=$(".ChoixDevise").val();
		var annee_acadenimique=$('.annacad').html();
		//Ouverture de la requette Asynchrone vers le ficher php
		$.post("php/__insertionMountfFromTablesTempon.php",{mois:mois,matricule:matricule,ChoixDevise:ChoixDevise,annacad:annee_acadenimique},
	function(data){
    $("#loader").hide();
	    if(data!=1){
	  }
	    else{
          	affichageMoisEleve(matricule,annee_acadenimique);
          	Elementempons(matricule);
          	TotalPanier(matricule);
    		    }
   });

});
//insertion frais unique dans le tempon
$('.btnValiderUnique').click(function(){
	var id=$('.frais_unique').val();
	var annee_acadenimique=$('.annacad').html();
	var deviseUniqueFrais=$('.deviseUniqueFrais').val();

	 $.post('php/__insertionMountfFromTablesTempon.php',{id:id,matricule_autre:matricule,annacad:annee_acadenimique,deviseUniqueFrais:deviseUniqueFrais},function(uniqueFrais){
	 	
	 	if(uniqueFrais==1){
	 		Elementempons(matricule);
        	TotalPanier(matricule);
	 	}
	 	});
  });
//insertion des articles multiples dans le tempons
$(".btnValiderVente").click(function(){
	var matricule=$(".matricule_detail").val();
	var libelle=$(".vente").val();
	var deviseUniqueArticle=$('.deviseUniqueArticle').val();
	
	verificatonVariable(libelle);
	var qte=$(".qteAcheter").val();
	$(".vente").val('');
	var qteAcheter=$('.qteAcheter').val();
	if(matricule=='' || libelle==''||qte==''){
			}
	else{
	//ouvertures de la requttes asynchrone vers les fichiers php
	$.post("php/__insertionMountfFromTablesTempon.php",{matricule_vente:matricule,libelle:libelle,qte:qte,qteAcheter:qteAcheter,deviseUniqueArticle:deviseUniqueArticle},function(insertionVente){
       if(insertionVente==1){
    	Elementempons(matricule);
        TotalPanier(matricule);
        //$('.vente').val();
    }

	});

	}
});

$(".btnDeleteTmp").click(function(){
	$("#loaderDelete").show();
	var matricule=$(".matricule_detail").val();
	var annee_acadenimique=$('.annacad').html();
	$.post("php/__delete_tmp.php",{matricule:matricule},function(TmpDelete){ 
	$("#loaderDelete").hide();
	 if(TmpDelete!=1){
	 	

	 } 
	 else{
	 	Elementempons(matricule);
	 	$('.appoint').show();

	 	affichageMoisEleve(matricule,annee_acadenimique);
	 	$('.total_panier').html('');
	 	$('.total_panier').hide();
	 	$('.btn-confirm').hide();

	}

 });

});

$(".btnConfirmerAppoint").click(function(){
    var matricule=$(".matricule_detail").val();
      window.location='validation_appoint.php?matricule='+matricule+'';
   });

});