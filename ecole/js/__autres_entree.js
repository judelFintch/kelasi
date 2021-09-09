$(function(){


	//function gestion des insertion autres frais non pris en charge par le system
	  function envoisElementFormulairE(libelle,nom_eleve,montant,option_devise,description,annacad_old){
	  	$.post('php/__autres_entree.php',{valide:true,libelle:libelle,nom_eleve:nom_eleve,option_devise:option_devise,description:description,montant:montant,annacad_old:annacad_old},function(data){
             if(data!=''){
   
			          window.location='autres_fact.php?matricule='+data+'';


             }
	  	});	  	
	  }

//function permettant d afficher les formulaire
  function afficherleformulaire(){
  	
  }

	 $(".bntValiderAutres").click(function(){
	 	var libelle=$('#libelle_operation').val();
	 	var nom_eleve=$('#nom_eleve').val();
	 	var montant=$('#montant').val();
	 	var option_devise=$('#option_devise').val();
	 	var description=$('#description').val();
	 	var annacad_old=$('#annacad_old').val();
	 	  if(libelle=='' ||  nom_eleve=='' ||  montant=='' || option_devise=='' ||description=='' ){
	 	  	return false;
	 	  }
	 	  else{
	 	  	envoisElementFormulairE(libelle,nom_eleve,montant,option_devise,description,annacad_old);
	 	  }


	 	  

	 });

	 









})