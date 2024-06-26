$(function(){
	$('.textIndiction').hide();
    //Au chagement du compte
       $('.numer_compte').change(function(){
      //recuperation du compte
    	var compte=$('.numer_compte').val();
    	    if(compte==1){
    	   	//ouverture de la requette asynchrone
    	  	$('.messageDeretour').empty().append('Aucun selectionner').addClass('alert alert-danger');
    	   	$('.compte_select').hide();
    	   	$('.textIndiction').hide();
    	   }
    	   else{
    	   	 $.post("php/__gestion_de_compte.php",{compte:compte},function(data){
    	   	  	if(data!=''){
    	   	  		$('.textIndiction').show().fadeIn(10000);
    	   	  		$('.messageDeretour').removeClass('alert alert-danger').show().empty().append(data);
    	   	  		$('.compte_select').show().empty().append(compte);
    	   	  	}
    	   	  });
    	   }
    });
    //Creation compte depenses
    $('.validerBtn').click(function(){
    	var compte_d=$('.numer_compte').val();
    	var libelle=$('.compte').val();
    	var retour=verificationFormulaire(libelle);
          if(retour==false){
    	   $('.messageDeretour').append('Le libelle est obligatoire').addClass('alert alert-danger');
   	         }
    	  if(retour==true){
    	   //si la condition est vraie on ouvre la requette Asyncrone
    	   $.post("php/__gestion_de_compte.php",{compte_d:compte_d,retour:retour,libelle:libelle},function(dataD){
    	   	if(dataD==true){
    	   	$('.messageDeretour').empty().append('<br>Operation Effectée Avec Succée').addClass('alert alert-success');
    	   		$('.compte_select').hide();
    	   	    $('.textIndiction').hide();
    	   	 }
    	   	  else{
    	   	  	 $('.messageDeretour').empty().append('le libelle saisi existe déja dnas la base').addClass('alert alert-danger');
    	   	  	 $('.compte_select').hide();
    	         $('.textIndiction').hide();
    	   	  }
    	   });
    	 }
    });
    //function gestion du compte
    function verificationFormulaire(compte){
    if(compte==''){
      	return false;
      }
      else{
      	return true;
      }
    }
 })// fin du ouverture jQuery