<?php
  require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
  function InformationEleve($matricule){
       	global $bdd;
      	$selection_informationEleve=$bdd->query("SELECT * FROM eleve WHERE matricule='$matricule'");
      	$info_de_base=$selection_informationEleve->fetch();
      	return $info_de_base;
      	//$categorie_eleve=$info_de_base['categorie'];
  }





   