<?php
 require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
 //Recherche de la facture
 if(isset($_POST['codefact'])){
    $donnees=RechercheFacture($_POST['codefact']);
}
 if(isset($_POST['codefact_suppres'])){
 	$codefact=$_POST["codefact_suppres"];
  
  $initiale=substr($codefact,0,1);
  if($initiale=='S'){
    InsertionCorbeilleDepense($codefact);
    
}
  if($initiale=='F'){
  $matricule=$_POST['matricule'];
   InsertionCorbeille($codefact);
  }
}
function selectionElementDepense($codefact){
  global $bdd;
  $selection_facture=$bdd->query("SELECT * FROM depense WHERE code_sortie IN('$codefact')");
  $selection_facture=$selection_facture->fetchAll();
  return $selection_facture;
}
function SelectiMoisLieAlaFacture($codefact){
  global $bdd;
  $selection_mois=$bdd->query("SELECT moisp FROM mois WHERE cdfact='$codefact' ");
  $resultat_mois=$selection_mois->fetchAll();
  return $resultat_mois;
}
function RechercheLeMoisDansFinance($codefact){
  global $bdd;
  $element_facture=$bdd->query("SELECT * FROM finance WHERE cdfact='$codefact'");
  $resultat_finance=$element_facture->fetchAll();
  return $resultat_finance;
}

 function RechercheFacture($codefact){
 	global $bdd;
 	$item="";
       $codefact=htmlentities($codefact);
        $intiale_facture=substr($codefact,0,1);
         if($intiale_facture=='S' OR $intiale_facture='F'){
              $selection_facture=$bdd->query("SELECT * FROM finance WHERE cdfact IN('$codefact')");
              foreach ($selection_facture as $key ) {
		           $item .= "<tr>";
               $item .= "<td class='matricule'>".$key['matricule']."</td>
                         <td class='matricule'>".$key['nom_eleve']."</td>
                         <td class='code'>".$key['cdfact']."</td>
                         <td>".$key['motif']."</td><td>".$key['montantcdf']."</td>
                         <td>".$key['montantusd']."</td>
			                   <td>".$key['devise']."</td>
                         <td>".$key['date_enreg']."</td>";
		      $item .= "</tr>";
	    }
	    echo utf8_encode($item);
	    return $selection_facture;
          }
        //suppresion des depenses
          else if($intiale_facture=='D'){
            $selection_facture=selectionElementDepense($codefact);
          	  foreach ($selection_facture as $key ) {
		           $item .= "<tr>";
               $item .= "<td>".$key['id']."</td>
                         <td class='code'>".$key['code_sortie']."</td>
                         <td>".$key['motif']."</td><td>".$key['compte']."</td>
                         <td>".$key['montantcdf']."</td>
                         <td>".$key['montantusd']."</td>
                         <td>".$key['devise']."</td>
                         <td>".$key['date']."</td>";

		      $item .= "</tr>";
	    }

	   echo utf8_encode($item);
	   return $selection_facture;

           }

          else{

          	  echo 'Aucune Correspondance';
          }
	
 }
 function SuppressionFactureFrais($codefact,$matricule){
 	global $bdd;
  global $annacad;
  $selection_annee=$bdd->query("SELECT anne_acad FROM finance WHERE cdfact='$codefact' ");
  $annacad_recep=$selection_annee->fetch();
  $annacad_recep=$annacad_recep['anne_acad'];
  if($annacad_recep<>$annacad){
  echo 7;
    exit;
  }               
 $initial_fac=substr($codefact,0,2);
        if($initial_fac=="FI"){
       $suppression_eleve=$bdd->query("DELETE  FROM eleve WHERE matricule='$matricule'")or die(print_r($bdd->errorInfo()));
       $supp1_tout_facture=$bdd->query("delete  from   frais_insciption  where cdfact like '$codefact'  and  cdfact in (select  cdfact  FROM finance  WHERE type like ('Inscription'))")or die(print_r($bdd->errorInfo()));

                    	}

                        if($initial_fac=="FR"){

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
                
          $delete_dernier_enregistement_mois=$bdd->query("DELETE FROM mois where matricule='$matricule' and cdfact='$codefact' ");
               


                        }
             }

 $test=substr($codefact,0,2);

if($test=='FL'){

recherherDonneesLieesAuMois($codefact,$matricule);

}
if($test=='FM'){
recherherDonneesLieesAuMois20162017($codefact,$matricule);

} $supp_tout_facture=$bdd->query("delete  from autre_frais where cdfact like '$codefact' and cdfact in (select  cdfact  FROM finance  WHERE type in ('Achat','Autres'))")or die(print_r($bdd->errorInfo()));
$update_mois=$bdd->query("update mois set   etat = 'dispo', cdfact =''  where cdfact like  '$codefact'  ")or die(print_r($bdd->errorInfo()));
  $supp2_tout_facture=$bdd->query("delete  from 	minerval  where cdf like '$codefact' and cdf in (select  cdfact  FROM finance  WHERE type like ('Frais Appoint'))")or die(print_r($bdd->errorInfo()));
   $suppression_facture=$bdd->query("DELETE  FROM finance WHERE cdfact='$codefact'")or die(print_r($bdd->errorInfo()));

 }


function SuppressionFactureDepense($codefact){
    global $bdd;
      
    $delete_depense=$bdd->query("DELETE   FROM depense WHERE code_sortie in('$codefact')");
}

function InsertionCorbeille($codefact){
  $user=1;

    $resultat_finance=RechercheLeMoisDansFinance($codefact);
    foreach ($resultat_finance as $key) {
      # code...
     if($key['devise']=='CDF'){
       Corbeille(
              $key['nom_eleve'],
              $key['montantcdf'],
              $key['motif'],
              $key['cdfact'],
              $key['motif'],
              $user,
              $user,
              $key['devise'],
              $key['type'],
              $key['date_enreg']);
}
else{
  
    Corbeille($key['nom_eleve'],
              $key['montantusd'],
              $key['motif'],
              $key['cdfact'],
              $key['motif'],
              $user,
              $user,
              $key['devise'],
              $key['type'],
              $key['date_enreg']);

      }

   }

}

function InsertionCorbeilleDepense($codefact){
  $user=1;
  echo 1;
  $donneesDepense=selectionElementDepense($codefact);
  foreach ($donneesDepense as $key) {
    # code...
     if($key['devise']=='CDF'){
       Corbeille(
              $key['motif'],
              $key['montantcdf'],
              $key['compte'],
              $key['code_sortie'],
              $key['nom_recepteur'],
              $user,
              $key['effectuer_par'],
              $key['devise'],
              $key['compte'],
              $key['date']);
}
else{
  
    Corbeille($key['nom_eleve'],
              $key['montantusd'],
              $key['compte'],
              $key['cdfact'],
              $key['motif'],
              $user,
              $user,
              $key['devise'],
              $key['compte'],
              $key['date']);

      }
  }


}




function Corbeille($nom_eleve,$montant,$pour,$code,$libelle,$effectuer_par,$supprimer_par,$devise,$type,$date){
    global $bdd;
    global $annacad;
    $bdd->query("INSERT INTO corbeille VALUES('',
                                              '$nom_eleve',
                                              '$montant',
                                               now(),
                                              '$pour',
                                              '$code',
                                              '$libelle',
                                              '$type',
                                              '$effectuer_par',
                                              '$supprimer_par',
                                              '$devise',
                                              '$annacad',
                                              '$date'
                                              )")or die(print_r($bdd->errorInfo()));
  }



