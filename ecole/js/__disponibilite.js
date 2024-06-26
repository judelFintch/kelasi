$(function(){
	$(".pannelChange").hide();
	$(".btnChange").hide();
      $(".status").change(function(){
      	var status = $(".status").val();
      	if(status=="false"){
      		$(".pannelChange").addClass("alert-danger").show().html("Choix Inccorrect ");
      		$(".btnChange").hide();
      	}
      	else{
               $(".pannelChange").addClass("alert-danger").show().html("Vous êtes sur le point de Changer le statut des l\'eleve en : <b>"+status+"</b>");
               $(".btnChange").show();
            }
    
      });
      $(".btnChange").click(function(){
      	var status = $(".status").val();
      	var matricule_detail=$(".matricule_detail").val();
      	var annacad=$(".annacad").val();
      	  $.post("php/__disponibilite.php",{status:status,matricule_detail:matricule_detail,annacad:annacad},function(data){
      	  	if(data=='ok'){
      	  		
      	  		$(".pannelChange").empty().html("Operation Effectuée Avec Success").toggleClass("alert-danger").addClass("alert-success");
      	  		$(".btnChange").hide();
      	  	}
      	  });
      });
});