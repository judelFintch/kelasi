$(function(){

	//begin
	 var nom =$('#nom_md').val();
     var prenom=$("#prenom_mod").val();
      $('title').text(nom+' '+prenom);
      var montantcdf=$('#montantcdf').html();
      var montantusd=$('#montantusd').html();
     //Activation du montant pardefaut en USD
       $('#montant').val(montantusd);
       $('.ChoixDevise').change(function(){
        var optionsCheck=$('.ChoixDevise').val();
	     if( optionsCheck=='USD'){
             $('#montant').val(montantusd);
	   }
	    else if(optionsCheck=='CDF'){
         $('#montant').val(montantcdf);
	   }
	  else{
	      $('#montant').val(500);
	}
      });
//INSS AOUT / ARS CLINIC  USD 5717.66 /649+994 
})