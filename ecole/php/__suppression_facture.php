 <?php
 require_once('../../config/allscirpt.inc.php');
  function recherDepense($codefacture){
  	global $bdd;
  	global $annacad;
  	//requette
 $resultatDepense=$bdd->query("SELECT * FROM depense WHERE code_sortie_s like('$codefacture')")
 or die(print_r($bdd->erroinfo()));
  if($resultatDepense->rowCount()==1){
      $depenseDetails=$resultatDepense->fetchAll();
  }
  else{
  	  $depenseDetails=0;
  }
 return $depenseDetails;
 }

function rechercheFrais($codefacture){
	global $bdd;
  	global $annacad;
  	$codefacture;
	$selectFrais=$bdd->query("SELECT * FROM finance WHERE cdfact='$codefacture'")or die(print_r($bdd->erroInfo()));
        $selectFrais=$selectFrais->fetchAll();
    return $selectFrais;

  }
  //recherche les informations dans la table mois
  function moisAsupprimer($codefacture){
  	global $bdd;
  	$select_mois=$bdd->query("SELECT moisp,annee_acad FROM mois WHERE cdfact like('$codefacture')");
  	 $mois=$select_mois->fetchAll();
  	 return $mois;
  }
  function deleteAllDepense($codefacture){
  	global $annacad;
  	global $bdd;
  	 $deleteAllDepense=$bdd->query("DELETE FROM depense WHERE code_sortie_s like('$codefacture')") or die(print_r($bdd->errorInfo()));
  	 return true;
  }

 function deleteFromEleve($matricule){
  	global $annacad;
  	global $bdd;
  	 $suppression_eleve=$bdd->query("DELETE  FROM eleve WHERE matricule='$matricule'")or die(print_r($bdd->errorInfo()));
  	 return true;
  }


 function deleteFromInscription($matricule){
  	global $annacad;
  	global $bdd;
  	 $suppression_inscription=$bdd->query("DELETE  FROM frais_insciption  WHERE matricule='$matricule'")or die(print_r($bdd->errorInfo()));
  	 return true;
  }

 function deleteFromfinance($codefacture){
 	global $annacad;
  	global $bdd;
 	$deleteFromfinance=$bdd->query("DELETE FROM finance WHERE cdfact like('$codefacture') ")or die (print_r($bdd->erroInfo()));
 	return true;
 }

function deleteAllFromMois($matricule){
	global $annacad;
  	global $bdd;
  	$matricule;
	$deleteAllFromMoisr=$bdd->query("DELETE FROM mois WHERE matricule='$matricule' AND annee_acad='$annacad'") or die(print_r($bdd->errorInfo()));
	return true;
}
function deleteAllFromSituation($matricule,$annacad){
	global $bdd;
	$deleteAllFromSituation=$bdd->query(" DELETE FROM bsituation WHERE matricule like('$matricule') AND 	anneescolaire='$annacad' ") or die(print_r($bdd->errorInfo()));
	return true;
}

function updateMounth($matricule,$mois,$numfact,$annacad){
	global $bdd;
	$matricule;
	$udpate=$bdd->query("UPDATE mois SET etat='dispo'  where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo('ici')));

	$udpate=$bdd->query("UPDATE mois SET cdfact=''  where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo('ici')));
}

function restitutionReinscription($matricule,$codefact){
	global $bdd;
	$recherche_des_information=$bdd->query("SELECT * FROM archives WHERE matr='$matricule' order by id desc limit 1 ");
            while($anciennes_information_eleve=$recherche_des_information->fetch()){
                            
                            $promotion=$anciennes_information_eleve['promotion'];
                            $categorie_classe=$anciennes_information_eleve['categorie_classe'];
                            $annacad=$anciennes_information_eleve['annacad'];
                            $date_inscription=$anciennes_information_eleve['date_inscripition'];
                            $categorie_eleve=$anciennes_information_eleve['categorie_eleve'];
                            $pourcentage=$anciennes_information_eleve['pourcentage'];
                            $mention=$anciennes_information_eleve['mention'];
                            $photo=$anciennes_information_eleve['photo'];

                    $udpatefive=$bdd->query("UPDATE eleve SET promotion='$promotion' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $udpatesix=$bdd->query("UPDATE eleve SET categorie='$categorie_eleve' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $udpateseven=$bdd->query("UPDATE eleve SET annacad='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $one=$bdd->query("UPDATE eleve SET mention='$mention' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $to=$bdd->query("UPDATE eleve SET pourcentage='$pourcentage' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $udpatenine=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_classe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $udpatten=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_classe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
                    $udpateeleve=$bdd->query("UPDATE eleve SET photo='$photo' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));

         // $udpate_fr_deux=$bdd->query("UPDATE frais_insciption SET montant='$frais_insert' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_trois=$bdd->query("UPDATE frais_insciption SET classe='$promotion' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_quatre=$bdd->query("UPDATE frais_insciption SET annee_scolaire='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_cinq=$bdd->query("UPDATE frais_insciption SET date='$date_inscription' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $delete_dernier_enregistement=$bdd->query("DELETE FROM archives where matr='$matricule' order by id desc limit 1");
                
         
               
return true;

   }
}


 function UpdateOldMonth($articles,$matricule,$annacad){
   global $bdd;
   $articles;
  
      switch ($articles) {
      case 'Septembre':
     
             $updatesete=$bdd->query("UPDATE  bsituation SET M_sep='' where matricule='$matricule' AND anneescolaire='$annacad'") or die(print_r($bdd->errorInfo()));
             break;
             case 'Octobre':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Octobre='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Novembre':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Novembre='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Decembre':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Decembre='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Janvier':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Janvier='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Frevier':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Fevrier':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Mars':
              $updatesete=$bdd->query("UPDATE bsituation SET Mois_de_Mars='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Avril':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Avril='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Mais':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Mais='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Mai':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Mais='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              case 'Juin':
              $updatesete=$bdd->query("UPDATE bsituation SET M_Juin='' where matricule='$matricule' AND anneescolaire='$annacad'");
              break;
              default:
              # code...
      break;
            }

      
      }
if(isset($_POST['operation']) && $_POST['operation']==true){ 
	extract($_POST);
	$codefacture=filtrageVariable($codefacture);
	  if(substr($codefacture,0,1)=='S'){
	  	//frais
	  	$recherche=rechercheFrais($codefacture);
       $mois_sup=moisAsupprimer($codefacture); 
	  		foreach ($recherche as $key) {
	  	  	    $type=$key['type'];
	  	  	    $matricule=$key['matricule'];
	  	   	     if($type=='Autres' or $type=='Achat'){
	  	   	     	$retourMessage=deleteFromfinance($codefacture);
	  	   	     	 $retourMessage=true;
	  	   	        }
	  	   	        if($type=='reinscription'){
	  	   	        	$deleteAllFromSituation=deleteAllFromSituation($matricule,$annacad);
	  	   	        	//echo $deleteAllFromSituation;
	  	   	        	$deleteMois=deleteAllFromMois($matricule,$annacad);
	  	   	        	$restutition=restitutionReinscription($matricule,$codefacture);
	                  }
	  	   	             if($type=='inscription'){
	  	   	         	  //$matricule=rechercheFrais($codefacture,$annacad);
	  	   	         	  //delete dans toutes les tables
	  	   	         	  $deleteMois=deleteAllFromMois($matricule,$annacad);
	  	   	         	  $deleteAllFromSituation=deleteAllFromSituation($matricule,$annacad);
	  	   	         	  $deleteFromEleve=deleteFromEleve($matricule);
	  	   	         	  $deleteFromInscription=deleteFromInscription($matricule);
                      }
                         if($key['compte']==2006){
                         	//$motif=$key['motif'];
                          $annee_scolaire=$key['pour_annee'];
                         	$codefacture=$key['cdfact'];
                         	//petit probleme ici
                         	foreach ($mois_sup as $mois ) {
                         	  	# code...
                         	  	   $motif=$mois['moisp'];
                                 $annee_scolaire=$mois['annee_acad'];
                         	  $UpdateOldMonth=UpdateOldMonth($motif,$matricule,$annee_scolaire);
                            $updateMounth=updateMounth($matricule,$motif,$codefacture,$annee_scolaire);
                          
                       
                         	  }
                    }
	  	   }
	  	    $deleteFromfinance=deleteFromfinance($codefacture);
	  	    echo true;
	  }
	  else{
	  	//depense
	  	$retourMessage=deleteAllDepense($codefacture);
	  	echo true;
	  }
}

