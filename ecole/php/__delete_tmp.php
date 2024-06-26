<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
function updateMounth($matricule,$mois,$annacad){
	global $bdd;
	$success=true;
	$udpate=$bdd->query("UPDATE mois SET etat='dispo' where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo()));
	return $success;
}
function SelectionEtatTempoms($matricule){
	global $bdd;
	$selection_information_tmp=$bdd->query("SELECT * FROM tempons where matricule='$matricule'");
	$donnees_tm=$selection_information_tmp->fetchAll();
	return $donnees_tm;
}

function deleteTmp($matricule){
	global $bdd;
	$deleteTmp=$bdd->query("DELETE FROM tempons");
}
function exectutionDelete($matricule){
	$mois_recept=SelectionEtatTempoms($matricule);
	  foreach ($mois_recept as $key) {
		# code...
		   if($key['nature']=='Autres'){
			   deleteTmp($matricule);

		   }
		  else{
		 $libelle=$key['libelle'];
		 $matricule=$key['matricule'];
		 $annacad=$key['pour_annee'];
		 if(updateMounth($matricule,$libelle,$annacad)){
		 	deleteTmp($matricule);
		 }
	  }
		
  }

}
if(isset($_POST['matricule'])){
	exectutionDelete($_POST['matricule']);
	echo (1);

	


}





