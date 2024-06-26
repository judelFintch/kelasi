<body>
	<?php include('header.php');?>

	 <!--formulaire enregistrement frais hors systeme -->

	  <div class="row">
	  	<button class="btn btn-warning bntOperationAutresFrais">Autres frais </button>
	     <div class="col-lg-8">
	        <div class="input-group col-lg-5 formulaire_autre_frais">
	             <input type="text" id="libelle_operation" placeholder="Libelle de l'operation" required="" class="form-control" name="">
	       </div>
          <div class="input-group col-lg-5">
	         <input type="text" id="nom_eleve" placeholder="nom de l'éléve" class="form-control" required="" name="">
	      </div>
            <div class="input-group col-lg-5">
	       <input type="number" id="montant" placeholder="montant en USD ou en CDF" class="form-control" required="" name="">
	       </div>

	        <div class="input-group col-lg-5">
	       <input type="number" id="annacad_old" placeholder="pour l'année" class="form-control" required="" name="">
	       </div>

	       <div class="input-group col-lg-5">
	        <select id="option_devise" class="form-control option_devise">
	        <optgroup label="Choix Devise">
	        	<option value="USD">USD</option>
	        	<option value="CDF">CDF</option>
	       </optgroup>
	     
	        </select>

	       </div>

	       <div class="input-group col-lg-5">
	         <textarea id="description" class="form-control" >
	         	

	         </textarea>
	       </div>
	       <hr>
	      <button class="btn btn-success bntValiderAutres">Valider</button>


	      </div>


	      <div class="col-lg-4">
	        <div class="retourMessege alert"></div>


	      </div>
	  </div>



	  <!--Fin formulaire enregistrement frais hors systeme -->





 
 <?php  include('footer.php');?>
<script type="text/javascript" src="js/__autres_entree.js"></script>


