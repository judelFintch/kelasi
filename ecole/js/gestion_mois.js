$(function(){
	////////gestion de mois appoint
	
	var annee_acadenimique=$('.annacad').html();
	var matricule=$('#matricule_detail').val();
	$.post('class/__mois_eleves.php',{matricule:matricule,annee_acadenimique:annee_acadenimique},function(donnees){
		$('#mois').val(donnees);
	});
});






