<?php include('header.php'); ?>
 <?php $selection_section=$bdd->query('SELECT * FROM section order by codesection desc');?>
     <?php $selection_option=$bdd->query('SELECT * FROM options_section');?>
      <?php $selection_compte=$bdd->query('SELECT * FROM jeux_de_compte');?>
</head>
<body>
  <?php  include_once('class/__function.php');?>
<div class="row">
	<div class="col-lg-8">
		<label><center>Création Nouvel article</center></label>
		<hr>
		<form  action="" method="post">
			<div class="row">
			    <label class="col-lg-2" for="nom">Libelle</label>
				 <div class="col-lg-5">
				     <input class="form-control" type="text" placeholder="Nouvel article" name="nomart" required />
				  </div>
				</div>
	       <div class="row">
	          		<label class="col-lg-2" for="nom">Prix</label>
                    <div class="col-lg-5">
				    <input type="text" class="form-control" placeholder="Prix du nouvel article"  name="prix" required />
			</div>
		       </div>
			  <div class="row">
                       <label for="compte" class="col-lg-2">Section</label>
                        <div class="col-lg-5">
                         <select required class="form-control" id="section"  name="section">
                             <?php  
                               while($resultat_section=$selection_section->fetch()){
                                echo '<option >'.$resultat_section['section'].'</option>' ;} 
                         ?>
                        </select>
              </div>
           </div>

        <div class="row compte">
         <label for="compte" class="col-lg-2">Compte</label>
           <div class="col-lg-5">
                <select required class="form-control" id="compte"  name="compte">
           <?php  
                   while($compte=$selection_compte->fetch()){
          echo '<option value='.$compte['numero_compte'].'>'.$compte['libelle'].'('.$compte['numero_compte'].')</option>' ;
                    } 
             ?>
                </select>

              </div>
           </div>

				<div class="row">

				<label class="col-lg-2"  for="ens">DEVISE</label>
                 <div class="col-lg-5">
				<select class="form-control"  name="devise"  required>
																<option value="false" >--Select--</option>
																<option >USD</option>
																<option >CDF</option>
														
													  </select>
													  </div>
													</div>
			<div class="row">
			   <label class="col-lg-2"  for="ens">Type Article</label>
                 <div class="col-lg-5">
				<select class="form-control comptable"  name="type"  required>
																<option >--Select--</option>
																<option value="1" >Comptable </option>
																<option value="0" >Non comptable</option>
														
													  </select>
													  </div>
												</div>
			<div class="row qteRow">
			   <label class="col-lg-2"  for="ens">Quantité</label>
                 <div class="col-lg-5">
                 	<input type="number" class="form-control qte" value="0" name="qte">
				
				</div>


						</div>
		<input class="form-control"  type="hidden" name="annacad" value="<?php echo $annacad; ?>" required /><span style="color:white;">Modifier si necessaire</span><br /> 
				<hr
				<label></label><input type="submit" value="ENREGISTRER" class="btn btn-success" /><br /><br /> 
			</form>
		
</div>
<div class="col-lg-4">
	<label>Approvissionnement</label>
	<hr>

	<select class="form-control articleId">
		<?php $tabarticle=$bdd->query("SELECT id,nom_article FROM articles   ORDER BY nom_article ASC") or die(print_r($bdd->erroinfo()));
		     while($tabarticlerecept=$tabarticle->fetch()){
		     	echo '<option value='.$tabarticlerecept['id'].'>'.$tabarticlerecept['nom_article'].'</option>';

		     }
		  ?>
	</select>
	<p></p>
	<input type="text"  placeholder="Tapez la Quantité svp" class="form-control qteAppro" name="">
	<p></p>

	<div class="row">
			   
                 <div class="col-lg-5">
				<select class="form-control comptable"  name="type"  required>
																
																<option value="1" >Comptable </option>
																
														
													  </select>
													  </div>
												</div>
												<p></p>
	<button class="btn btn-success btnValiderUpdateArt">Valider</button>
    <p></p>
	<div class="messageRetrour"></div>


	</div>
</div>
		
<?php
	if (isset($_POST['nomart'])) {
		$nomcart =$_POST['nomart'];
		$prix = $_POST['prix'];
		$devise =$_POST['devise'];
		$anne =$_POST['annacad'];
		$compte=$_POST['compte'];
		$section=$_POST['section'];
		$type=$_POST['type'];
		$qte=$_POST['qte'];


		Creation_Article($nomcart,$prix,$devise,$anne,$section,$compte,$type,$qte);
	  }
	?>
<?php include('footer.php');  ?>
<script type="text/javascript" src="js/__creat_article_contrainte.js"></script>