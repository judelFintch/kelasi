<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
  //function des verifications informations liees au compte
   function VerificationInformationCompte($compte){
   	global $bdd;
   	$selection_info=$bdd->query("SELECT  libelle,numero_compte FROM jeux_de_compte WHERE numero_compte IN('$compte');") or die(print_r($bdd->errorInfo()));
    $tabInfo=$selection_info->fetchAll();
    return $tabInfo;
   }
   function VerificationInformationCompteSecond($libelle){
    global $bdd;
    $selection_info=$bdd->query("SELECT  numero_de_compte FROM compte WHERE compte IN('$libelle');");
    $tabInfo=$selection_info->fetch();
    return $tabInfo;
   }
   //f
   //function insertion du compte
   function insertionCompte($compte,$libelle){
   global $bdd;
   $bdd->exec("INSERT INTO compte VALUES('','$libelle','$compte')") or die(print_r($bdd->errorInfo()));
   return true;

   }
   //verfication des declancher
   if(isset($_POST['compte'])){
   	extract($_POST);
   	$tabInfo=VerificationInformationCompte($compte);
   foreach ($tabInfo as $key ) {
   	# code...
   	 echo "<ul class='list-group'><li class='list-group-item'>".$key['libelle']."</li></ul>";
   }
}
   //creation du compte depense
   if(isset($_POST['compte_d'])){
    extract($_POST);
    $libelle=@mysql_real_escape_string($libelle);
    $execuction_cmd=insertionCompte($compte_d,$libelle);
    echo $execuction_cmd;
   
   }
   if(isset($_POST['libelle'])){
    extract($_POST);
    $libelle=@mysql_real_escape_string($libelle);
    $numero_compte=VerificationInformationCompteSecond($libelle);
    echo $numero_compte['numero_de_compte'];


   }

   
