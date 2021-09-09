<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
if(isset($_POST['matricule']) and isset($_POST['annee_acadenimique'])){
	$annacad=$_POST['annee_acadenimique'];
	$matricule=$_POST['matricule'];

	
$selection_mois=$bdd->query("SELECT moisp FROM mois WHERE matricule='$matricule' and etat='dispo' and annee_acad='$annacad' order by id asc limit 1") ;
$mois=$selection_mois->fetch();
echo $mois['moisp'];


}