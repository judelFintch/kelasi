<?php
 require_once('../../config/allscirpt.inc.php');


 function Creationcodefacture(){
	global $bdd;
	global $annacad;
	    $selection_numero_facture=$bdd->query(" SELECT id FROM facture ORDER BY id DESC LIMIT 1");
		$facture=$selection_numero_facture->fetch();
		$Initial="SLM";
		$id=$facture['id']+1;
		$numfact=$Initial.$id;
		return $numfact;
}

function insertionElementsFormulaire($libelle,$nom_eleve,$montant,$option_devise,$description,$annacad_old){
	global $bdd;
	global $taux;
	global $annacad;
	$numfact=Creationcodefacture();
	
if($option_devise=='CDF'){
	$bdd->exec("INSERT INTO finance values('','$nom_eleve','L0222','C003','$libelle','00','$montant','$annacad',now(),'CDF','Autres ','$taux','$numfact','0','2018','$annacad_old',1)")or die(print_r($bdd->errorInfo()));
  }
   if($option_devise=='USD'){

		$bdd->exec("INSERT INTO finance values('','$nom_eleve','L0222','C003','$libelle','$montant','00','$annacad',now(),'USD','Autres ','$taux','$numfact','0','2018','$annacad_old',1)")or die(print_r($bdd->errorInfo()));
  }

  $bdd->exec('INSERT INTO facture VALUES()');
   return $numfact;

}

if(isset($_POST['valide'])){
	 extract($_POST);
	 $libelle=filtrageVariable($libelle);
	 $nom_eleve=filtrageVariable($nom_eleve);
	 $montant=filtrageVariable($montant);
	 $option_devise=filtrageVariable($option_devise);
	 $description=filtrageVariable($description);
	 $annacad_old=filtrageVariable($annacad_old);
	 $retour=insertionElementsFormulaire($libelle,$nom_eleve,$montant,$option_devise,$description,$annacad_old);
	 echo $retour;

}

