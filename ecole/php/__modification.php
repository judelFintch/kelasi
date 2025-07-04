<?php
    require_once('../../bdd_app_gst_connect/allscirpt.inc.php');

    function modificationInformation($adresse_mod,$matricule_detail,$nom_md,$post_mod,$date_naiss_mod,$sexe_mod,$classe_mod,$prenom_mod,$categorieEleve){
    	global $bdd;
    	global $annacad;

    	$nom_eleve=$nom_md.' '.$post_mod;
         
         //dans la table eleve
    	   $modification=$bdd->query("UPDATE eleve SET nom='$nom_md' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo()));
    	   $modification=$bdd->query("UPDATE eleve SET postnom='$post_mod' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo())); 
    	   $modification=$bdd->query("UPDATE eleve SET prenom='$prenom_mod' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE eleve SET daten='$date_naiss_mod' WHERE matricule='$matricule_detail' AND annacad='$annacad'") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE eleve SET sexe='$sexe_mod' WHERE matricule='$matricule_detail' AND annacad='$annacad'") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE eleve SET promotion='$classe_mod' WHERE matricule='$matricule_detail' AND annacad='$annacad'") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE eleve SET adresse='$adresse_mod' WHERE matricule='$matricule_detail' AND annacad='$annacad'") or die(print_r($bdd->errorinfo()));

           $modification=$bdd->query("UPDATE eleve SET categorie='$categorieEleve' WHERE matricule='$matricule_detail' AND annacad='$annacad'") or die(print_r($bdd->errorinfo()));

    	   //dans la table fiance
           

    	   $modification=$bdd->query("UPDATE finance SET nom_eleve='$nom_eleve' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE finance SET classe_eleve='$classe_mod' WHERE matricule='$matricule_detail' AND anne_acad='$annacad'") or die(print_r($bdd->errorinfo()));

    	   //Dans la table bsituation
    	     $modification=$bdd->query("UPDATE bsituation SET nom_eleve='$nom_eleve' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE bsituation SET classe='$classe_mod' WHERE matricule='$matricule_detail' AND anneescolaire='$annacad'") or die(print_r($bdd->errorinfo()));
    	   //dans la table inscription

    	    $modification=$bdd->query("UPDATE frais_insciption SET nom='$nom_eleve' WHERE matricule='$matricule_detail' ") or die(print_r($bdd->errorinfo()));

    	   $modification=$bdd->query("UPDATE frais_insciption SET classe='$classe_mod' WHERE matricule='$matricule_detail' AND annee_scolaire='$annacad'") or die(print_r($bdd->errorinfo()));



    }




  if(isset($_POST['matricule_detail'])){
  	  extract($_POST);
	  	  $matricule_detail;
		  $nom_md;
		  $post_mod;
		  $date_naiss_mod;
		  $sexe_mod;
		  $classe_mod;
		  $prenom_mod;
		  $adresse_mod;
	      $retrour=modificationInformation($adresse_mod,$matricule_detail,$nom_md,$post_mod,$date_naiss_mod,$sexe_mod,$classe_mod,$prenom_mod,$categorieEleve);

  }  