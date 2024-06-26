 $(function(){
var matricule=$('.matricule').val();
 	$.post("php/__traitement_litige.php",{success:true,matricule_tmp:matricule},function(panierVirtuel){
             		$('.panier').empty().append(panierVirtuel);
             	});
          //au click du button appoint on traite le formulaire
     $('.btnAppoint').click(function(){
          var libelle=$('.libelle_mois').val();
          var annacad=$('.annacad').val();
           $.post("php/__traitement_litige.php",{matricule_ap:matricule,libelle:libelle,annacad_old:annacad},function(data){
             if(data==true){
             	$.post("php/__traitement_litige.php",{success:true,matricule_tmp:matricule},function(panierVirtuel){
             			$('.panier').empty().append(panierVirtuel);
             	});
             }

         });

     });
  $('.btnAutresfrais').click(function(){
          var libelle=$('.libelle_autres').val();
          var matricule=$('.matricule').val();
          var annacad=$('.annacad').val();
           //ouverture de la requette asynchrone
           $.post("php/__traitement_litige.php",{matricule:matricule,libelle:libelle,annacad_old:annacad,litige:true},function(data){
             if(data==true){
             	$.post("php/__traitement_litige.php",{success:true,matricule_tmp:matricule},function(panierVirtuel){
             			$('.panier').empty().append(panierVirtuel);
             	});
             }
           });
     });
  $('.delete').click(function(){ 
  alert('ok');});
  });