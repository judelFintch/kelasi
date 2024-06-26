$(function(){
	//gestion de la reinscription
//cacher la classe messega error
$('.error').hide().empty();
//recuperation de l'ancienne classe eleve
  var promotion_ancienne=$("#promotion_ancienne").val();
//recuperation de la classe lors de la reinscription
	$("#promotion_r").focusout(function(){
		var promotion= $("#promotion_r").val();
		$.post("class_test.php",{promotion_new:promotion,promotion_ancienne:promotion_ancienne},function(data){
			if(data==1){
			    $('.error').empty();
			    $('.error').show().fadeIn('slow').html('L\'eleve Passe de classe').addClass('alert-success');
		        $('#mention').val('Satisfaction');
			}

		   if(data==2){
				$('.error').show().text('L\'eleve double de classe').addClass('alert-danger');
			
				$('#mention').val('Double');

			("#promotion_r").attr('autofucus');
		}
			
			if(data==5){
					$('.error').show().html('Avertissement verifier la classe Saisi').addClass('alert-danger');
					("#promotion_r").attr('autofucus');
				
			}
			
		});

	});

});









  

