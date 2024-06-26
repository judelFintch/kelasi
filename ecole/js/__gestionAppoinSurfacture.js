$(function(){
  var matricule=$(".matricule").val();
	 $.post('php/__insertionMountfFromTablesTempon.php',{codefactureAfficher:true,matricule:matricule},function(codefacture){
	  $('.codefacture').html(codefacture);});
	 	  if(matricule!=''){
            $.post("php/__insertionMountfFromTablesTempon.php",{matricule_facture:matricule},function(matriculesend){
			   if(matriculesend!=''){
			     $(".table").append(matriculesend);
		           $.post("php/__insertionMountfFromTablesTempon.php",{matricule_facture_nom:matricule},function(dataInformationsEleves){
			        if(dataInformationsEleves!=''){
			          $(".InformationEleves").html(dataInformationsEleves);
			             $.post('php/__insertionMountfFromTablesTempon.php',{valideOperation:true,matricule:matricule},function(successOperation){	
	              });
	            }
	         });
		  }
		});
	}
})


