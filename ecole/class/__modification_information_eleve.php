<?php


function ModificationInformationEleve(){
  global $bdd;
  global $matricule_md;
  global $lieu_naiss_mod;
  global $annacad;
 
                	                        global $post_mod;
                	                         global $nom_md;
                	                        global $contatenation_nom;
                	                        global  $prenom_mod;
                	                        global  $date_naiss_mod;
                	                        global  $nation_mod;
                	                        global  $adresse_mod;
                	                        global  $promotion_mod;
                	                        global  $categorie_mod;
                	                        global $categorie_classe_mod;
                	                        global $etat_classe_mod;



				############################### MODIFICATION INFORMATION ELEVE#################

						  	if(isset($_POST['matricule_md'])){
						  		
						  	   $udpateone=$bdd->query("UPDATE eleve SET nom='$nom_md' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	     $udpateto=$bdd->query("UPDATE eleve SET postnom='$post_mod'WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	      $udpatefre=$bdd->query("UPDATE eleve SET prenom='$prenom_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	       $udpatefour=$bdd->query("UPDATE eleve SET daten='$date_naiss_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	        $udpatefive=$bdd->query("UPDATE eleve SET nation='$nation_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	         $udpatesix=$bdd->query("UPDATE eleve SET adresse='$adresse_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	          $udpateseven=$bdd->query("UPDATE eleve SET promotion='$promotion_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	           $udpateheigt=$bdd->query("UPDATE eleve SET categorie='$categorie_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	            $udpateheigt=$bdd->query("UPDATE eleve SET lieun='$lieu_naiss_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	             $udpateheigt=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_classe_mod' WHERE matricule='$matricule_md'") or die(print_r($bdd->errorInfo()));
						  	             
    $udpateagainone=$bdd->query("UPDATE autre_frais SET nom_eleve='$contatenation_nom', classe='$promotion_mod' WHERE matricule='$matricule_md' and annee='$annacad'") or die(print_r($bdd->errorInfo()));
    $udpateagaito=$bdd->query("UPDATE finance SET nom_eleve='$contatenation_nom',classe_eleve='$promotion_mod'  WHERE matricule='$matricule_md' and anne_acad='$annacad'") or die(print_r($bdd->errorInfo()));
    $udpateagaintree=$bdd->query("UPDATE frais_insciption SET nom='$contatenation_nom', classe='$promotion_mod' WHERE matricule='$matricule_md' and annee_scolaire='$annacad'") or die(print_r($bdd->errorInfo()));


						  	             header('location: detail.php?matricule='.$matricule_md.'');

                                       


						  	}
						  //	unset($_POST['matricule_md']);




}