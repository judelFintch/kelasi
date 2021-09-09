<?php
ob_start(); 
include('header.php'); ?>
<?php 
  include_once('class/__function_inscription_et_reinscription.php');  
  $matricule=$_POST['matricule'];
  SelectionToutesInformationelves($matricule);
  $inscription=false;
  ParametreMoisEjourInsciptions();
  AttributionCodeFactureAutomatiquement($inscription); 
  AttributionMatriculeAutomatiquement();
?>
<body>
<div class="mentionAppoint"></div>
		<form method="post" action="" class="form-inline correction" enctype="multipart/form-data" >	
				</legend>
					<input type="text" class="form-control nom"  name="nom" value="<?php echo $nomrc;?>" placeholder="Nom" required/>
					<input type="text" class="form-control postnom"  name="postnom" value="<?php echo $postnom;?>" placeholder="Postnom"  required/><br />
					<input type="text" class="form-control daten" value="<?php echo $daten;?>"   name="daten" placeholder="Date de naissance AAAA-MM-JJ" />
					<input type="text" class="form-control prenom"  name="prenom" value="<?php echo $prenom;?>"  placeholder="Pr&eacute;nom" />
					<input type="text" class="form-control oldclasse"  id="promotion_ancienne" name="classe" readonly value="<?php echo $promotion_ancienne;?>"  />
					<input type="text" class="form-control adresse"  name="addr" value="<?php echo $categorie_classe_ancienne;?>" />
					<input type="text" class="form-control sexe"  name="sexe" value="<?php echo $sexe;?>" placeholder="Sexe" required/>
					<?php if($_SESSION['level']==1){$status='hidden';}else{$status='';}?>
					<input type="<?php echo $status;?>" format=('Y-m-d') class="form-control date"  name="date" value="<?php echo gmdate('Y-m-d'); ?> " placeholder="Adresse" /><br />
													
					<legend>PHOTO</legend>
									   <input type="file" class="form-control photo" title="Selectionner une Photo"  multiple="file"  name="photo"/>
				   </p>		
	<legend>ECOLE</legend>
	  <div class="retrouMessage"></div>
		<div class="row">
			 <div class="col-lg-12">
			  <input type="text"  value="" class="form-control classe" size="40" id="promotion_r" name="promo" placeholder="  Classe Eleve" required />
				<select class="form-control categorie_paiement"  name="categorie">	
				    <option>Totalite</option>
				    <option>Moitie</option>
				    <option>Pris en charge</option>
					</select>
						<select class="form-control modePaiement"  name="modePaiement">
					<option>Normal</option>
					<option>Elargi</option>
				</select>
					<div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-addon">$</div>
                         <input type="text"  name="reduction" class="form-control reduction" placeholder="Reduction">
                          <div class="input-group-addon">.00</div>
                       </div>
                    </div>
					<input type="hidden" class="form-control codep"  value="<?php echo $codep; ?>"  name="codep" placeholder="Code parent" />
                    <input type="hidden" class=" matricule"  value="<?php echo $matricule;  ?>" readonly/><br />
					<input type="hidden" class="form-control annacad"  name="annacad" value="<?php echo $annacad; ?>" readonly/>
			   <legend>INFORMATION POUR NOUVELLE CLASSE</legend>
		       <input type="text" class="form-control mention"  name="mention" id="mention"  placeholder="Mention">
		       <input type="number" class="form-control pourcentage"  name="pourcentage"  placeholder="% Obtenu"  />
		       <input type="hidden" class="form-control link"   value="reinscription" readonly/>
			   <input type="button"  class="btn btn-primary btnValidation" value="Enregistrer" /></p>
			
		</form>
		 </div>
</div>
<?php include('footer.php');  ob_end_flush();?>
<script type="text/javascript" src="js/__inscription.js"></script>