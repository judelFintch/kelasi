$(function(){
	$('.classe').keyup(function(){
		var nomeleve=$('.nom').val();
		var postnom=$('.postnom').val();
		var sexe=$('.sexe').val();
		var pays=$('.pays').val();
		var lieun=$('.lieun').val();
		var classe=$('.classe').val();
          if(nomeleve=='' || postnom=='' || sexe=='' || sexe==0 || pays==0 || pays=='' || lieun==''){ 
          	$('.btnValidationGroup').hide();
          	$('.retrouMessage').removeClass('alert alert-success').empty().addClass('alert alert-danger').append('Tous les champs sont obligatoire').show();
          	return false
          }
          else{
          	$.post('php/__contrainte_inscription.php',{nomeleve:nomeleve},function(retourVerification){
          		//alert(retourVerification);

          	});
          	$('.btnValidationGroup').show();
          	$('.retrouMessage').hide();
          	return true;
          }

	});

});