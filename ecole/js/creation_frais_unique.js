$(function(){
  //function creation Frais unique
  $('.classe_classe').hide();
     $('.options').hide();
    //ecoutes des evenment clavier sur les combox section
     $('#section').change(function(){
     var choix=$('#section').val();
       if(choix=='une classe'){
        $('.classe_classe').show();
      }
      else{
         $('.classe_classe').hide();
      }    
  });
  //masque les informations de la classe
   //$('.classe_classe').hide();
  //recuperation de variable via id a l ecoute de l evenement click
	$('.btn-creatArticleUnique').click(function(){
      //recuperation de variables
     var section=$('#section').val();
     var devise=$('#devise').val();
     var prix=$('#prix').val();
     var compte=$('#compte').val();
     var libelle=$('#libelle').val();
     var annacad_art=$('#annacad').val();
      if(section=='une classe'){
          var classer=$('#classe_frais').val();
          var specification=classer;
         }
      else if(section=='Toutes les sections'){
      var classer=true;
      var specification=true;
     }
      else{
      var specification=false;
      var classer=false;
     }
          
    VerificationInput(section,devise,libelle,prix,classer,specification,compte,annacad_art);
	});
	function VerificationInput(section,devise,libelle,prix,classer,specification,compte,annacad_art){
		if(section=='' || devise=='' || libelle=='' || prix==''){
           //Afficahge des message d alertes
			$('.alertAll').empty().addClass('alert alert-danger').append("Tout les champs Sont obligatoire!").fadeOut(20000);
			
      //return false;
		}
		else{
      
			CreationFraisUnique(section,devise,libelle,prix,classer,specification,compte,annacad_art);
      
			//return true;
		}
  }
   function CreationFraisUnique(section,devise,libelle,prix,classer,specification,compte,annacad_art){
      	//ouverture d'une requette asynchrone
   	 $.post("php/creation_frais_unique.php",{secure_link:true,section:section,devise:devise,libelle:libelle,prix:prix,classer:classer,specification:specification,compte:compte,annacad_art},function(data){
   	 	if(data==1){
   	 		$('.alertAll').empty().addClass('alert alert-success').append('Operation reussie!').fadeOut(10000);
   	 	}
   	 });
  }
 
})
