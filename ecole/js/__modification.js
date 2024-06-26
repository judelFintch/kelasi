$(function(){
	  $('.modificationInf').click(function(){
	  	var matricule_detail=$('#matricule_detail').val();
	  	var nom_md=$('#nom_md').val();
	  	var post_mod=$('.post_mod').val();
	  	var prenom_mod=$('.prenom_mod').val();
	  	var date_naiss_mod=$('.date_naiss_mod').val();
	  	var sexe_mod=$('.sexe_mod').val();
	  	var classe_mod=$('.classe_mod').val();
	  	var adresse_mod=$('.adresse_mod').val();
	  	var categorieEleve=$('.categorieEleve').val();

	  	  $.post('php/__modification.php',{adresse_mod:adresse_mod,prenom_mod:prenom_mod, matricule_detail:matricule_detail,nom_md:nom_md,post_mod:post_mod,date_naiss_mod:date_naiss_mod,sexe_mod:sexe_mod,classe_mod:classe_mod,categorieEleve:categorieEleve},function(data){
             if(data==1){
             	 alert('Modification reussi');

             }
	  	  });

	  });
})