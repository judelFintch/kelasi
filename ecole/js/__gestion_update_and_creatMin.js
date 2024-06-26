$(function(){
	$('.action').change(function(){ 
      //virification pour action
       var action=$('.action').val();
         //bad select 0
          if(action==0){
          	$('.retrourMessage').empty().append('Choix incorrect').addClass('alert alert-danger');
          	return false;
        }
        // update select it 1
           if(action==1){ 
           	  var classe=$('.classe').val();
           	  var annneeScolaire=$('.anneeScolaire').val();
           	   if(classe==0){
           	   		$('.retrourMessage')empty().append('Choix de la classe incorrect').addClass('alert alert-danger');
           	   		return false;
           	   }
           	   else{
           	   	//ouverture de la requettes asynchrone pour verification de la classe
           	   	$.post("php/__gestion_update_and_creatMin.php",{classe:classe,anneeScolaire:anneeScolaire},function(update){
           	   		alert(update);

           	   	});
           	   }
        }
        // creat  2
         if(action==2){
        }
        
	});
       
});