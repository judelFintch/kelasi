<?php ob_start(); include('header.php'); ?>
<?php  include_once('class/__function.php');?>
<body>
		<div class="row">
		  <div class="col-lg-10">
			<form action="" method="post" enctype="multipart/form-data">
			<?php  $selection_compte_depense=$bdd->query('SELECT compte,numero_de_compte FROM compte');?>

			<div class="row">
                <label for="montant" class="col-lg-2">Date</label>
                <div class="input-group  col-lg-5">

                <input class="form-control" id="date_op"  type="date" name="date_op" required />
                </div>
				
				</div>

               <div class="row">
               <label for="compte" class="col-lg-2">Compte de Sortie</label>
               <div class="input-group col-lg-5">

                <select required class="form-control compte" id="compte"  name="compte">
                 <option value="1">--Selection Compte--</option>
                <?php  while($resulta_compte=$selection_compte_depense->fetch()){
                         echo '<option>'.$resulta_compte['compte'].'</option>' ; } ?>
                </select>
                </div>
               </div>

                <div class="row">
                <label for="montant" class="col-lg-2">Montant</label>
                <div class="input-group  col-lg-5">

                <input class="form-control" id="montant" style="text-align:right" placeholder="Montant en USD ou en CDF"  type="number" name="montant" value="" required /><span class="input-group-addon">$ ou FC</span>
                </div>
				
				</div>

                <div class="row">
                <label for="nom_ben" class="col-lg-2">Nom beneficiaire</label>
                  <div class="input-group col-lg-5">
				       <input class="form-control" id="nom_ben" required placeholder="Nom du Beneficiaire"   type="text" name="nom" value="" required />
				   </div>
				</div>
				<div class="row">
                <label for="nom_ben" class="col-lg-2">Numero Compte</label>
                  <div class="input-group col-lg-5">
				       <input class="form-control numcompte"  id="numcompte" required placeholder="" readonly=""   type="text" name="numcompte" value="" required />
				   </div>
				</div>

				<div class="row">
				   <label for="motif_dep" class="col-lg-2">Motif de depense</label>
				      <div class="input-group col-lg-5">
				          <input class="form-control motif_dep" id="motif_dep"  type="text" required="" placeholder="Motif de la depense" name="motif" value="" required />
				        </div>
				 </div>
				
				<div class="row">
				   <label for="devise" class="col-lg-2" >Devise</label>
				     <div class="input-group col-lg-5">
				
				   <select class="form-control"  required=""  id="devise"  name="devise">
				      <option value="1">--Select Devise--</option>

					
					<option>USD</option>
					<OPTION>CDF</OPTION>
				</select>
				</div></div>


				
				<div class="row">
				 <div class="col-lg-7 btnContaine">
				 <hr>
				<input type="reset"  class="pull-right btn btn-danger" />
                 <input type="button" value="Valider"   class="pull-right btn btn-success validerDepense" />
				</div>
				</div>
				

			</form>
		</div><div class="messageRetour"></div>
	</div>	
	<hr>
	
 <?php
	
			
?>
</body>
<?php include('footer.php'); ob_end_flush(); ?>
<script>$('.motif_dep').autocomplete({source:'php/_motif_de_depense.php'}); </script>
<script type="text/javascript">
   $(function(){
   	//message partde faut 
   	 $('.numcompte').val('Compte non selectionner');
   	 $('.btnContaine').hide();
   	 $('.compte').change(function(){
   	 	var compte=$('.compte').val();
   	 	  if(compte==1){
   	 	  	$('.numcompte').val('Compte non selectionner');
   	 	  	$('.btnContaine').hide();
   	 	  	 return false;
   	 	  }
   	 	  else{
   	 	  	$.post("php/__gestion_de_compte.php",{libelle:compte},function(data){$('.numcompte').val(data);});
   	 	  	$('.btnContaine').show();
   	 	  }
   	  })
   });
	</script>

	<script type="text/javascript" src="js/__depense.js"></script>