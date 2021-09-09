<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
function selectionMounth($mat,$annacad){
	global $bdd;
   $selection_mois=$bdd->query("SELECT moisp FROM mois WHERE matricule='$mat' and etat='dispo' and annee_acad='$annacad' order by id asc limit 1") ;
   $mois=$selection_mois->fetchAll();
   return $mois;
}
if(isset($_POST['matricule'])){
	echo '<meta charset="UTF-8">';
	$mois=selectionMounth($_POST['matricule'],$_POST['annacad']);
	if(!empty($mois)){
	$item="";
	foreach ($mois as $key ) {
		$item .= "<option>".$key['moisp']."</option>";
	}
	echo utf8_encode($item);
	}
	else{
	echo utf8_encode(0);
	}
}