<?php include('header.php'); ?>
<body>
<div class="row">
    <div class="col-lg-5">
		<form>
		  <input type="text" required autofocus="" placeholder=" <?php  echo $user.' '.$salutation;?>c'est qoui le code facture? " class="form-control codefact" />
		<span class="recept_code"></span>
									
		</form>
		</div>
<div class="col-lg-7">
<div  class="textResultat">Resultat de la facture</div>
 <div class="detailsFacture"></div>
 <button class="pull-right  btn btn-success btnValider">Supprimer</button>
  </div>
   </div>
<hr>
	<div class="row">
	    <div class="col-lg-6">
	</div>
	</div>
<?php  include('footer.php');  ?>
<script type="text/javascript" src="js/__affichage_facture.js"></script>