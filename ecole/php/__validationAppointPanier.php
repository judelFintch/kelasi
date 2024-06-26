<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
function SelectionEtatTempoms($matricule){
	global $bdd;
	$selection_information_tmp=$bdd->query("SELECT * FROM tempons where matricule='$matricule'");
	$donnees_tm=$selection_information_tmp->fetchAll();
	return $donnees_tm;
}
function executionInsertion
  if(isset($_POST['matricule'])){
	SelectionEtatTempoms($_POST['matricule']);
}













