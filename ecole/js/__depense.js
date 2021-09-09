$(function(){

	//recuperation des variables depenses
     function operationDepense(date_op,compte,montant,motif,nom_ben,motif_dep,devise,numcompte){
         //ouverture de la fonction asynchrone 
         $.post("php/__depense.php",{date_op:date_op,compte:compte,montant:montant,motif:motif,nom_ben:nom_ben,motif_dep:motif_dep,devise:devise,numcompte:numcompte},function(data){
             if(data==1){
             	$('.messageRetour').empty().addClass('alert alert-success').append('Operation reussi');
             
     	      $('#montant').val('');
     	      $('#motif').val('');
     	      $('#nom_ben').val('');
     	      $('#motif_dep').val('');
     	      $('#numcompte').val('');

             }
         });



     }

     $('.validerDepense').click(function(){
     	var date_op=$('#date_op').val();
     	var compte=$('#compte').val();
     	var montant=$('#montant').val();
     	var motif=$('#motif').val();
     	var nom_ben=$('#nom_ben').val();
     	var motif_dep=$('#motif_dep').val();
     	var devise=$('#devise').val();
     	var numcompte=$('#numcompte').val();
          //execution de la re
     	  operationDepense(date_op,compte,montant,motif,nom_ben,motif_dep,devise,numcompte);






     });






});