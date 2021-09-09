<?php 
require_once('../bdd_app_gst_connect/allscirpt.inc.php');
$requete1 = $bdd->query("SELECT distinct classe FROM infomin  ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $entete ?></title>
<?php include('liens_boostrap.php') ?>>
<style type="text/css">
#hed,#re{
display:table-cell;
}
#he{
background-color:black;
color:royalblue;}
li{
	list-style-type: none;
}
label{
	display: inline-block;
	width: 20%;
}
#cl input,select{
	width: 30%;
}
</style>
</head>

<body>
	<?php include('header.php'); ?>
		<article style="background-image:url(2.jpeg); background-size:100px 100%; border:1px solid grey;">
			<p align="center"><h4>Changer le montant Mensuel d'une classe</h4></p>
		
		<div style="margin-left:20%;" id="cl">
			<form action="" method="post">
				
				<label for="code">Montant Totalité</label><input type="text" name="montant" /><br />
				<label for="code">Moitier Prix</label><input type="text" name="montantM" /><br />
				<label for="code">Pris En charge</label><input type="text" name="montantP" /><br />
		<label for="ens">Classe</label><select name="classe" required>
																<option value="Select">Selectionner une classe</option>
														<?php
															while ($resultat1 = $requete1->fetch()) {
															echo'<option value="'.$resultat1['classe'].'">'.$resultat1['classe'].'</option>';
															}
														?>
													  </select><br />
		
				<label for="code">ANNEE SCOLAIRE</label><input type="text" name="annacad" value="<?php echo $annacad; ?>" /><span style="color:white;">Modifiez si necessaire</span><br /><br />
				<label></label><input type="submit" value="Cr&eacute;er classe" class="btn btn-success" /><br /><br /> 
			</form>
		</div>
		</article>


		<?php

include("recherche.php");
if (isset($_POST['montant'])){
   $montant=$_POST['montant'];
   $nomc = $_POST['classe'];
   $update1=$bdd->query("UPDATE  infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Totalite'")or die(print_r($bdd->errorInfo()));
   $update2=$bdd->query("UPDATE infomin annacad SET annacad='$annacad' WHERE classe='$nomc' and etat='Totalite'")or die(print_r($bdd->errorInfo()));     
 }
 if(isset($_POST['montantM'])){
 $montant=$_POST['montantM'];
 $nomc = $_POST['classe'];
 $update=$bdd->query("UPDATE infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Moitie'")or die(print_r($bdd->errorInfo()));
 $update=$bdd->query("UPDATE infomin  annacad SET annacad='$annacad' WHERE classe='$nomc' and etat='Moitie'")or die(print_r($bdd->errorInfo()));
 }
 if(isset($_POST['montantP'])){
 $nomc = $_POST['classe'];
 $montant=$_POST['montantP'];
 $update=$bdd->query("UPDATE infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Pris en charge'")or die(print_r($bdd->errorInfo()));
 $update=$bdd->query("UPDATE  infomin annacad SET annacad='$annacad' WHERE classe='$nomc' and etat='Pris en charge'")or die(print_r($bdd->errorInfo()));
echo "<center>Operation effectuee avec Succes</center>";
 }
      
	

else{
	echo "<center>Verifier toutes le variables</center>";


}
	

	
?>
		</div>
	<?php include('footer.php');  ?>	
		
</body>
</html><br />
