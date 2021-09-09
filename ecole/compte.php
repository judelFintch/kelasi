<?php 
require_once('../bdd_app_gst_connect/allscirpt.inc.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Creation Compte||<?php echo $entete ?></title>
<?php include('liens_boostrap.php') ?>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="row">
	  <div class="col-lg-6">
	    <p align="center"><h4><center>CREATION COMPTE DEPENSE</center></h4></p>
		  	<form action="" method="post" enctype="multipart/form-data">
				<label for="code">LIBELLE:</label>
				<input type="text" class="form-control compte" value="122" required   name="compte">
				<label>Compte</label>
				<select class="form-control numer_compte">
				<option value="1">--Select count--</option>
			    <?php  $selection_num_compte=$bdd->query("SELECT DISTINCT numero_compte FROM jeux_de_compte ") or die(print_r($bdd->erroInfo()));
			     while ($numer_compte=$selection_num_compte->fetch()) {
			     	 echo '<option>'.$numer_compte['numero_compte'].'</option>';
			     }
			      ?> 
				</select>
			  <input type="button" value="Valider" class="btn btn-success validerBtn" /> 
			</form>
		 </div>
		 <div class="col-lg-6 informationRetour">
		 <div class="textIndiction"><h3>Frais Lies au Compte <span class="compte_select">(<b></b>)</span></h3></div>
		  <div class="messageDeretour">
		  <!--2020267368553523--> 
		 </div>
		</div>
	</div>
	<hr>
<?php include('footer.php');  ?>
<script type="text/javascript" src="js/__gestion_de_compte.js"></script>