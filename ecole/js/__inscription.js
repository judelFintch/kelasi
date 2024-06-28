$(function(){
	//Autocomplete classe
	$('.retrouMessage').hide();
	$('.btnValidationGroup').show();
	$( ".classe" ).autocomplete({source: 'php/__autoclasse.php' });
	//execution de la fonction mention
	recuperationParemetreMensuel();
	//recuperation matricule nouvel eleve
	recuperationMatricule();
	//gestion de pametre mensuel
	function recuperationParemetreMensuel(){
		//envois de paremetre
		$.post('../php/__generation_matricule.php',{mention:true},function(mentionMois){
			if(mentionMois==true){
				 //passe a true quand il s'agit 
				 $('.mentionAppoint').append('Appoint pris en charge pour l\'autre Mois').addClass('alert  alert-info');
			}
			else{
				$('.mentionAppoint').append('Appoint Pris en Charge Pour C\'est Mois').addClass('alert  alert-info');
			}
		});
	}
	//fin affiche  parametre mensuel
	function recuperationMatricule(){
			//envois de paremetre
		$.post('../php/__generation_matricule.php',{matricule:true},function(matricule){$('#matricule').val(matricule);});
	}
	function verificationVariable(nomeleve,postnom,prenom,lieun,daten,sexe,adresse,provenance,pourcentage,mention,pays,classe){
		  if(nomeleve=='' ||postnom=='' || prenom=='' || lieun=='' || daten=='' || sexe=='' || sexe==0 || adresse=='' ||provenance=='' || pourcentage=='' || mention=='' || pays=='' || pays==0 || classe==''){
		  	return false;
		  }
		  else{
		  	return true;
		  }
	}
  //verification de la classe	
function retrouMessages(retrouMessage){
	return retrouMessage;
}	   	
   //recuperation des informations du formulaire
	$('.btnValidation').click(function(){
		var nomeleve=$('.nom').val();
		var postnom=$('.postnom').val();
		var prenom=$('.prenom').val();
		var lieun=$('.lieun').val();
		var daten=$('.daten').val();
		var sexe=$('.sexe').val();
		var adresse=$('.adresse').val();
		var provenance=$('.provenance').val();
		var pourcentage=$('.pourcentage').val();
		var mention=$('.mention').val();
		var pays=$('.pays').val();
		var photo=$('.photo').val();
		var classe=$('.classe').val();
		var categorie_paiement=$('.categorie_paiement').val();
		var reduction=$('.reduction').val();
		var modePaiement=$('.modePaiement').val();
		var date=$('.date').val();
		var matricule=$('.matricule').val();
		var link=$('.link').val();
		var verification=verificationVariable(nomeleve,postnom,prenom,lieun,daten,sexe,adresse,provenance,pourcentage,mention,pays,classe);
		if(verification==false){
			//$('.classe').addAttr('required');
			$('.retrouMessage').removeClass('alert alert-success').empty().addClass('alert alert-danger').append('Tous les champs sont obligatoire').show();
						
		}
		else{
	    $.post("php/__contrainte_inscription.php",{classe:classe},function(success){
			if(success==1){
				
			   insertionDebutInscription(nomeleve,postnom,prenom,lieun,daten,sexe,adresse,provenance,pourcentage,mention,pays,photo,classe,categorie_paiement,reduction,modePaiement,date,matricule,link);
			 }
			 else{
			 	$('.retrouMessage').removeClass('alert alert-success').empty().addClass('alert alert-danger').append('Erreur lors de la selection de la classe').show();

			 }
		});
	   }
	});
    //fin recuperation elements formualaire
    //traitement des inscription et reinscription
    function insertionDebutInscription(nomeleve,postnom,prenom,lieun,daten,sexe,adresse,provenance,pourcentage,mention,pays,photo,classe,categorie_paiement,reduction,modePaiement,date,matricule,link){
     $.post('php/__inscription.php',{nom:nomeleve,
     	                            postnom:postnom,
     	                            prenom:prenom,
     	                            lieun:lieun,
     	                            daten:daten,
     	                            sexe:sexe,
     	                            adresse:adresse,
     	                            provenance:provenance,
     	                            pourcentage:pourcentage,
     	                            mention:mention,
     	                            pays:pays,
     	                            photo:photo,
     	                            classe:classe,
     	                            categorie_paiement:categorie_paiement,
     	                            reduction:reduction,
     	                            modePaiement:modePaiement,
     	                            date:date,
     	                            matricule,
     	                            link:link},
     	                            function(dateSend){
     	                            	if(dateSend!=''){
     	                            		window.location='validation_appoint.php?matricule='+dateSend+'';
     	                            	}                                      
     });
    }
});