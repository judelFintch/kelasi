<?php
 require_once('../../config/allscirpt.inc.php');

 function verificationclasseeleve($classe){
 	global $bdd;
 	$classe_search=$bdd->query("SELECT nomclasse FROM classe WHERE nomclasse like('$classe')") or die(print_r($bdd->errorInfo()));
 	$classe=$classe_search->fetch();
 	 return $classe;
 }
 function rechercheNomeleve($nom){
 	global $bdd;
  //$nom=$bdd->query("SELECT nom ");
 }
if(isset($_POST['nom'])){
	print_r($_POST);
	 extract($_POST);
	   $nom=filtrageVariable($nom);
	   $postnom=filtrageVariable($postnom);
	   $sexe=filtrageVariable($sexe);
	   $prenom=filtrageVariable($prenom);
}
 if(isset($_POST['classe'])){
   extract($_POST);
   $classe=filtrageVariable($classe);
  $classe_return=verificationclasseeleve($classe);
   $classe_return['nomclasse'];
     if($classe_return['nomclasse']==$classe){
      echo 1;
    }
     else{
       echo 0;
    }
  
 }
