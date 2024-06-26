<?php ob_start();include('header.php'); include('php/header_detail_eleves.php');?>
<body>
<?php if(isset($_GET['annee_scolaire'])){
	echo '<div>
	         <ul class="list-group">
             <li class="list-group-item">
                 <span class="badge">'.$annacad.'</span>
                       <b>Règlement Litige</b>
                   </li>
               </ul>
             </div>
               ';
      }
           ?>
  <div class="row">
  <span class="annacad"><?php echo $annacad?></span>
	 <div class="col-md-3">
		<p id="name">
			<h4 class="alert alert-info">
			  <?php echo ''.$resultat['nom'].'-'.$resultat['prenom'].' ('.$resultat['promotion'].') '?>
			 </h4>
	     </p>
	<hr>
<!---Affichage photos eleves-->
<?php echo '	
<img class="img-responsive" src="../images/fr.jpg" width="100%" height="100%"  title="  '.$resultat['prenom'].' '.$resultat['nom'].'" alt="Photo maquante"/>';?>
<div  role="alert">
     <span class="list-group-item active">Parcours Scolaire</span>
		<?php
		  //verification parcours scolaire 			
				$i=0;
				$selection_distinc=$bdd->query("SELECT DISTINCT anne_acad FROM finance WHERE matricule='$mat'");
				while ($tabannee=$selection_distinc->fetch()) {
					# code...
       				$i++;
					  echo '
				          <ul class="list-group">
                            <li class="list-group-item" >
					        <a href="situation.php?matr='.$matricule.'&&annacad='.$tabannee['anne_acad'].'" >'.$tabannee['anne_acad'].'</a>
					       </li>
					    </ul>
					';
				}
                 echo '<input type="hidden" id="cont_id" value="'.$i.'">';?>
	</div>
</div>
<!-- Section gestion paiment-->
   <div class="col-md-5">
	   <h5 class="StyleMontantDetail">
	        <span id="montantusd"><?php echo ' '.$montantmensuelnormale.' ' ?>
	            </span> USD(<span id="montantcdf"><?php echo ' '.$conversioncdf.''?> </span> CDF) 
	            <b class="pull-right"><?php //echo ' '.$categorie.''?></b>
       </h5>
       <!--Formulaire -->
      <div class="row">
       <div class="col-lg-3">
            <input type="text" name="montant" id="montant" readonly '.$ecriture.' class="form-control" />
	</div>
		  <div class="col-lg-3">
		       <select class="form-control ChoixDevise">
			      <option>USD</option>
			      <option>CDF</option>
		     </select>
		  </div>
     		   <!--Formulaire -->   
       <div class="col-lg-6">          
        <div class="input-group  appoint">
		    <select class="mois form-control" ></select>
          <span class="input-group-btn">
	          <input type="button" value="Ajouter" class="button success btnValider"/>
           </span>
        </div>
    </div>
     </div>
        <hr>
        <label>Autres Frais</label>
        <div class="row">
        	<div class="col-lg-4">
        	 <select class="form-control deviseUniqueFrais">
		          <option value="1"> Default</option>
		          <option> USD</option>
		          <option> CDF</option>
		    </select>
		   </div>

		   <div class="col-lg-8">

          <div class="input-group col-lg-12">
		     <select class="frais_unique form-control" ></select>
		    
          <span class="input-group-btn">
          <input type="button" value="Ajouter" class="button success btnValiderUnique"/>
         </span>
       </div>
   </div>
   </div>
   <hr>
   <label>Article</label>
   <div class="row">

       <?php if(!isset($_GET['annee_scolaire'])){
       	echo '
       	<div class="col-lg-4">
        	 <select class="form-control deviseUniqueArticle">
		          <option> Default</option>
		          <option> USD</option>
		          <option> CDF</option>
		    </select>
		   </div>
         <div class="col-lg-5">
		    <input type="text" placeholder="Articles" required=""  class="form-control vente"/>
		 </div>

		  <div class="col-lg-2">
		    <input type="number" placeholder="qte" value="1" class="form-control qteAcheter"/ >
		 </div>

		 <div class="col-lg-4">
		    <input type="button" value="Ajouter" class="button success btnValiderVente"/>
		 </div>
        
          ';}?>
   </div>
<div id="loader" style="display:none"><img src="img/ajax-loader-yellow.gif"/> </div> 
	<hr>					
</div>						  
<!--Panier-->
<div class=" col-lg-4 PanierMounth">

</div>

	<span class="btn-confirm pull-right">
		<div id="loaderDelete" style="display:none"><img src="img/ajax-loader-yellow.gif"/> </div> 
					<button class="btnConfirmerAppoint"><img src="img/module_install.png"></button>
					<button class="btnDeleteTmp"><img src="img/module_notinstall.png"></button>
	</span>

<!-- Fin Panier-->
	
<!--Total pannier-->
<div class=" col-lg-4  alert alert-success total_panier"></div>
<!--Total pannier-->
<!--Section information eleve -->
<div class="col-md-5">
          <input  type="hidden" class="form-control annacad" id="annacad"<?php echo 'value=" '.$annacad.' "';?>/><br/>
          <input  type="hidden" class="form-control matricule_detail"  id="matricule_detail" <?php echo 'value="'.$resultat['matricule'].'"'?>/>

			<input type="text"  class="form-control" id="nom_md" <?php echo $ecriture; echo 'value="'.$resultat['nom'].' "'?><br/>
			<?php echo '

					<label for="postnom">Postnom :</label>
					<input name="post_mod" type="text" class="form-control post_mod"  '.$ecriture.'  size="15" value="'.$resultat['postnom'].'"/><br/>

					<label for="prenom">Pr&eacute;nom :</label>
					<input type="text" name="prenom_mod" class="form-control prenom_mod" id="prenom_mod" '.$ecriture.'  size="15" value="'.$resultat['prenom'].'"/><br/>

					<label for="daten">Date de naissance :</label>
					<input type="date" class="form-control date_naiss_mod"  name="date_naiss_mod" '.$ecriture.'    size="15" value="'.$resultat['daten'].'"/><br/>
				

					<label for="lieun">Sexe :</label>
					<input type="text" class="form-control sexe_mod" name="sexe_mod"  '.$ecriture.'  size="15" value="'.$resultat['sexe'].'"/><br/>

					<label for="lieun">Classe :</label>
					<input type="text" class="form-control classe_mod" name="classe_mod"  '.$ecriture.'  size="15" value="'.$resultat['promotion'].'"/><br/>

					<label for="lieun">Adresse :</label>
					<textarea class="form-control adresse_mod"  '.$ecriture.'  size="15" />
					'.$resultat['adresse'].'

					    </textarea><br/>

					';
		?>
		<button type="button" class="btn btn-warning modificationInf"> Modifier</button>
 <hr>
</div>

<!--Fin Section information eleve -->
  <div class="col-lg-4 pull-right">
           <span> <b>Statut Eleve :</b></span><br>
		       <select class="form-control status">
                    <option value="false">------------</option>';
                    <?php
                     $classe=$bdd->query("SELECT status FROM status  ");
                     while($classes=$classe->fetch()){echo'<option>'.$classes['status'].'</option>'; }?>
             </select> 
       <hr>
           <div class="alert  pannelChange"></div>
	        <input class="btn btn-success btnChange" type="submit" value="changer">
        </div>
    </div> 
<?php include('footer.php'); ob_end_flush();  ?>
<script>$(".vente").autocomplete({source:'php/_script_autocomple_barre_recherche.php'});</script>
<script type="text/javascript" src="js/__function_conversion_cdf_usd.js"></script>
<script type="text/javascript" src="js/__modification.js"></script>
<!--<script type="text/javascript" src="js/gestion_mois.js"></script>-->
<!--<script type="text/javascript" src="js/__disponibilite.js"></script>-->
<script type="text/javascript">
	  $('.annacad').hide();
</script>