<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
function verificationCategorieEleve($matricule){
	global $bdd;
	
    $selection_section_eleve=$bdd->query("SELECT categorie_classe,promotion  FROM eleve WHERE matricule IN('$matricule') ") or die(print_r($bdd->erroInfo()));
	$uniqueFrais=$selection_section_eleve->fetch();
	return $uniqueFrais;
}
function selectionFraisUnique($section,$matricule,$annacad){
	global $bdd;
	
	$item="";
	//recuperation des information liee a la promotion
    $informationEleve=verificationCategorieEleve($matricule);
    $promotion=$informationEleve['promotion'];
    $categorie_section=$informationEleve['categorie_classe'];
    $true="true";
    $selection_frais=$bdd->query('SELECT unique_frais.id,unique_frais.libelle FROM unique_frais where (section="'.$categorie_section.'" OR specifiaction_classe="'.$promotion.'" OR specifiaction_classe="'.$true.'" AND annacad="'.$annacad.'" )   AND  NOT EXISTS(SELECT  pidFrais FROM finance WHERE matricule="'.$matricule.'" AND finance.pidFrais=unique_frais.id) ') or die(print_r($bdd->errorInfo()));  
	   while($key=$selection_frais->fetch()){
		          $id=$key['id'];
		          $item .= "<option value='$id' >".$key['libelle']."</option>";
   }
echo ($item);
 }	
if(isset($_POST['matricule'])){
	 $categorie_classe=verificationCategorieEleve($_POST['matricule']);
	 $frais=selectionFraisUnique($categorie_classe['categorie_classe'],$_POST['matricule'],$_POST['annacad']);
   
}