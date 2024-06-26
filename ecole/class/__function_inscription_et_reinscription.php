<meta charset="UTF-8">
<?php
$newYear='b2017_2018';
function SelectionToutesInformationelves($matricule){
  global $bdd;
  global $nomrc;
  global $postnom;
  global $prenom;
  global $daten;
  global $categorie_eleve_ancienne;
  global $categorie_classe_ancienne;
  global $promotion_ancienne;
  global $annacad_acien;
  global $mention_acien;
  global $ancien_pourentage;
  global $ancien_photo;
  global $codep;
  global $Date_insciption_ancien;
  global $sexe;
  #######recuperation ddes information ###############
  if(isset($_POST['matricule'])){
   $matricule=htmlspecialchars(htmlentities($_POST['matricule']));
   $selection_eleve=$bdd->query("SELECT * FROM eleve WHERE matricule='$matricule'");
   $infos_eleve=$selection_eleve->fetch();
   $nomrc=$infos_eleve['nom'];
   $postnom=$infos_eleve['postnom'];
   $prenom=$infos_eleve['prenom'];
   $categorie_eleve_ancienne=$infos_eleve['categorie'];
   $categorie_classe_ancienne=$infos_eleve['categorie_classe'];
   $promotion_ancienne=$infos_eleve['promotion'];
   $annacad_acien=$infos_eleve['annacad'];
   $mention_acien=$infos_eleve['mention'];
   $ancien_pourentage=$infos_eleve['pourcentage'];
   $ancien_photo=$infos_eleve['photo'];
   $codep=$infos_eleve['codep'];
   $Date_insciption_ancien=$infos_eleve['date_insc'];
   $sexe=$infos_eleve['sexe'];
 }

}
function  AttributionCodeFactureAutomatiquement($inscription){
      global $bdd;
      global $codfcat;
      global $id;
      if (isset($inscription)) {
      if($inscription==true){
      $requete_finance = $bdd->query("SELECT id FROM finance ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
      $resultat_id = $requete_finance->fetch();
      $id=$resultat_id['id']+1;
      $intititiale="SLM";
      $codfcat=$intititiale.$id;
      }
      else{
      $requete_finance = $bdd->query("SELECT id FROM facture ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
      $resultat_id = $requete_finance->fetch();
      $id=$resultat_id['id']+1;
      $intititiale="SLM";
      $codfcat=$intititiale.$id;
      }
    }
  }
function AttributionMatriculeAutomatiquement(){
      global $bdd;
      global $matr;
       $requete_finance = $bdd->query("SELECT id FROM eleve ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
       $resultat_id = $requete_finance->fetch();

       $id=$resultat_id['id']+1;  
       $matr = date('y').''.$id;
       return $matr;  
    }

  function ParametreMoisEjourInsciptions(){
      global $bdd;
      global $mois_inscription;
      $jours_inscription=date('d');
      $nombre_jours_mois= date('t');
      $reste_nbre_de_jour=$nombre_jours_mois-$jours_inscription;
       if($reste_nbre_de_jour<=5){
          $mois_inscription=date('m')+1;
             if($mois_inscription==13){
              $mois_inscription=1;
             }
             else{
                $mois_inscription=date('m')+1;
             }
           $mention='Paie Pour Mois Porchain';
        }
        else if($reste_nbre_de_jour>5) {
            $mois_inscription=date('m');
             $mention='';
        } 
        global $mention;
    }

function  SelectionInformationPromotion($reduction,$promo) {
      global $bdd;
      global $categorie_cl;
      global $frais_insert;
      global $compte;
$select_categorie_classe=$bdd->query("SELECT categorie_classe from classe where nomclasse='$promo'");
    $resultat_categorie=$select_categorie_classe->fetch();
    $categorie_cl=$resultat_categorie['categorie_classe'];
    $selection_classe_prix=$bdd->query("SELECT frais_inscitpion,compte FROM classe where nomclasse='$promo'");
    $frais_recu_bb=$selection_classe_prix->fetch();
       if($frais_recu_bb['frais_inscitpion']>=$reduction){
             $frais_insert=$frais_recu_bb['frais_inscitpion']-$reduction;
             $compte=$frais_recu_bb['compte'];
           }
          else{
            echo '<p style="color:red;">Reduction Impossible Montant Superieur !</p>';
          exit();
    }
}
function UplaodPhotoSurleServeur(){
      global $id;
      global $nom_photo;
      global $upd;
      if(isset($_FILES['photo'])){  
        if($_FILES['photo']['size'] < 20000000){
    //Enregistrement photo eleve
        $nom_photo = 'photo'.$id;
        move_uploaded_file($_FILES['photo']['tmp_name'], './../images/'.$nom_photo);
     }
  }
}
function RecuperationDonneesFormulaireInscription(){
  if(isset($_POST['nom'])){
    global  $nom_new;
    global  $postnom;
    global  $nomclasse;
    global  $nom_cont;
    global  $prenom;
    global  $daten;
    global  $lieun;
    global  $nation;
    global  $addr;
    global  $promo;
    global  $codep;
    global  $annacad;
    global  $Date_insciption;
    global  $categorie;
    global  $reduction;
    global  $pourcentage;
    global  $sexe;
    global  $mention;
    global  $provenance;
    global  $matr;
    global  $modePaiement;
   }
 

}
#######appelation de la fonction taux###
function InsertionInfomrationArgentEtMois(){
  Taux_du_jour();
  global $bdd;
  global $matr;
  global $codfcat;
  global $nom_photo;
  global $taux;
  global $user;

    global  $nom_new;
    global  $postnom;
    global  $nomclasse;
    global  $nom_cont;
    global  $prenom;
    global  $daten;
    global  $lieun;
    global  $nation;
    global  $addr;
    global  $promo;
    global  $codep;
    global  $annacad;
    global  $Date_insciption;
    global  $categorie;
    global  $reduction;
    global  $pourcentage;
    global  $sexe;
    global  $mention;
    global  $provenance;
    global $frais_insert;
    global $compte;
    global $categorie_cl;
    $nom_cont=$nom_new.' '.$postnom;

    echo $compte;
    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Frais Inscription',
                                           '$frais_insert',
                                           '000',
                                           '$annacad',
                                           '$Date_insciption',
                                           'USD',
                                           'Inscription',
                                           '$taux',
                                           '$codfcat',
                                            '1',
                                           $compte)")or die(print_r($bdd->errorInfo()));

//$bdd->exec('INSERT INTO facture VALUES()');
}
function InsertionInfomrationEleve(){
  Taux_du_jour();
  global $bdd;
  global $matr;
  global $codfcat;
  global $nom_photo;
  global $taux;
  global $user;

    global  $nom_new;
    global  $postnom;
    global  $nomclasse;
    global  $nom_cont;
    global  $prenom;
    global  $daten;
    global  $lieun;
    global  $nation;
    global  $addr;
    global  $promo;
    global  $codep;
    global  $annacad;
    global  $Date_insciption;
    global  $categorie;
    global  $reduction;
    global  $pourcentage;
    global  $sexe;
    global  $mention;
    global  $provenance;
    global $frais_insert;
    global $categorie_cl;
    global $modePaiement;
    $nom_cont=$nom_new.' '.$postnom;
    $bdd->query("INSERT INTO eleve VALUES('',
                                         '$matr',
                                         '$nom_new',
                                         '$postnom',
                                         '$prenom',
                                         '$daten',
                                         '$lieun',
                                         '$nation',
                                         '$addr',
                                         '$promo',
                                         '$codep',
                                         '$nom_photo',
                                         '$annacad',
                                         '$user',
                                         '$Date_insciption',
                                         '$categorie',
                                         '$categorie_cl',
                                         'disponible',
                                         '$sexe',
                                         '$mention',
                                         '$pourcentage',
                                         '$provenance','$modePaiement')")or die(print_r($bdd->errorInfo()));

}
function InsertionDansArchiveEleve(){
  global $bdd;
  global $promotion_ancienne;
  global $categorie_classe_ancienne;
  global $Date_insciption_ancien;
  global $categorie_eleve_ancienne;
  global $mention_acien;
  global $ancien_pourentage;
  global $ancien_photo;
  global $annacad_acien;
  global $codep;
  global $matr;
  $bdd->query("INSERT INTO archives VALUES('',
                                           '$matr',
                                           '$promotion_ancienne',
                                           '$categorie_classe_ancienne',
                                           '$codep',
                                           '$annacad_acien',
                                           '$Date_insciption_ancien',
                                           '$categorie_eleve_ancienne',
                                           '$mention_acien',
                                           '$ancien_pourentage',
                                           '$ancien_photo')")or die(print_r($bdd->errorInfo()));
}

function MisAjourInformationEleve(){
  global $bdd;
  global $matr;
  global $codfcat;
  global $nom_photo;
  global $taux;
  global $user;
    global  $nom_new;
    global  $postnom;
    global  $nomclasse;
    global  $nom_cont;
    global  $prenom;
      
    global  $promo;
   
    global  $annacad;
    global  $Date_insciption;
    global  $categorie;
    global  $reduction;
    global  $pourcentage;
    global  $sexe;
    global  $mention_new;
    global  $provenance;
    global $mention;

    global $frais_insert;
    global $categorie_cl;
     $matricule=$matr;


  $udpatefive=$bdd->query("UPDATE eleve SET promotion='$promo' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpatesix=$bdd->query("UPDATE eleve SET categorie='$categorie' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpateseven=$bdd->query("UPDATE eleve SET annacad='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $one=$bdd->query("UPDATE eleve SET mention='$mention' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $to=$bdd->query("UPDATE eleve SET pourcentage='$pourcentage' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpateheigt=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_cl' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
$udpsatesexe=$bdd->query("UPDATE eleve SET sexe='$sexe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
            ################################################update les information des l eleve dans la table frais inscritpion##################


     $udpate_fr_one=$bdd->query("UPDATE frais_insciption SET matricule='$matricule' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
      $udpate_fr_deux=$bdd->query("UPDATE frais_insciption SET montant='$frais_insert' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_trois=$bdd->query("UPDATE frais_insciption SET classe='$promo' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
           $udpate_fr_quatre=$bdd->query("UPDATE frais_insciption SET annee_scolaire='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
           $udpate_fr_cinq=$bdd->query("UPDATE frais_insciption SET cdfact='$codfcat' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
}

function  CapaciteAcceuilDeLaClasse($promo){
  global $bdd;

   $select_capacite_classe=$bdd->query("SELECT capacite FROM classe WHERE nomclasse='$promo'");
               $capacite=$select_capacite_classe->fetch();
               $capacite=$capacite['capacite'];
               $capacite=$capacite-1;
               $update=$bdd->query("UPDATE classe SET capacite='$capacite'  where nomclasse='$promo' ");

}

function InsertionFraisInscription(){
  global $bdd;
  global $matr;
  global $codfcat;
 
  global $taux;
  global $user;

    global  $nom_new;
    global  $postnom;
    global  $nomclasse;
    global  $nom_cont;
    global  $prenom;
    global  $daten;
    global  $lieun;
    global  $nation;
    global  $addr;
    global  $promo;
    global  $codep;
    global  $annacad;
    global  $Date_insciption;
    global  $categorie;
    global  $reduction;
    global  $pourcentage;
    global  $sexe;
    global  $mention;
    global  $provenance;

    global $frais_insert;
    global $categorie_cl;
$bdd->query("INSERT INTO frais_insciption VALUES('',
                                                     '$matr',
                                                     '$nom_cont',
                                                     '$frais_insert',
                                                     '$promo',
                                                     '$annacad',
                                                     '$Date_insciption',
                                                     '$codfcat')")or die(print_r($bdd->errorInfo()));

}
function InsertionEleveEtMoisApayer(){
    $name_inscit=$nom_new.' '.$postnom;
  $nom_cont=$nom_new.' '.$postnom;

  $insertion=$bdd->query("INSERT INTO b2017_2018 (matricule,nom_eleve,classe,anneescolaire)VALUES('$matr','$nom_cont', '$promo',
                               '2016-2017')");
  switch ($mois_inscription) {
        case 6:
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion2=$bdd->query("INSERT INTO mois values('','Octobre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion3=$bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion4=$bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion5=$bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion6=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion7=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion8=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion9=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion10= $bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
  case 7:    
   $insertion1= $bdd->query("INSERT INTO mois values('','Septembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Octobre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));  
    break;
    case 8:             
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Octobre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 9:  
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Octobre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
     
    break;
    case 10:
    $updatesete=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $insertion=$bdd->query("INSERT INTO finance values('',
                                                      '$nom_cont',
                                                      '$matr',
                                                      '$promo',
                                                      'Septembre',
                                                      '0',
                                                      '0',
                                                      '$annacad',
                                                      '$Date_insciption',
                                                      'AUCUNE',
                                                      '101',
                                                      '$taux',
                                                      '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Octobre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    
    break;
    case 11:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
    
    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;

    case 12:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $updatesete3=$bdd->query("UPDATE  b2017_2018 SET M_Novembre='En ordre' where matricule='$matr'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
      
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
          
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo())); 
    break;
    case 1:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $updatesete3=$bdd->query("UPDATE  b2017_2018 SET M_Novembre='En ordre' where matricule='$matr'");
    $updatesete4=$bdd->query("UPDATE  b2017_2018 SET M_Decembre='En ordre' where matricule='$matr'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
  
    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 2:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $updatesete3=$bdd->query("UPDATE  b2017_2018 SET M_Novembre='En ordre' where matricule='$matr'");
    $updatesete4=$bdd->query("UPDATE  b2017_2018 SET M_Decembre='En ordre' where matricule='$matr'");
    $updatesete5=$bdd->query("UPDATE  b2017_2018 SET M_Janvier='En ordre' where matricule='$matr'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
   
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));                
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 3:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $updatesete3=$bdd->query("UPDATE  b2017_2018 SET M_Novembre='En ordre' where matricule='$matr'");
    $updatesete4=$bdd->query("UPDATE  b2017_2018 SET M_Decembre='En ordre' where matricule='$matr'");
    $updatesete5=$bdd->query("UPDATE  b2017_2018 SET M_Janvier='En ordre' where matricule='$matr'");
    $updatesete6=$bdd->query("UPDATE  b2017_2018 SET M_Fevrier='En ordre' where matricule='$matr'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Février',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));          
   $insertion1= $bdd->query("INSERT INTO mois values('','Mars','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 4:
    $updatesete1=$bdd->query("UPDATE  b2017_2018 SET M_sep='En ordre' where matricule='$matr'");
    $updatesete2=$bdd->query("UPDATE  b2017_2018 SET M_Octobre='En ordre' where matricule='$matr'");
    $updatesete3=$bdd->query("UPDATE  b2017_2018 SET M_Novembre='En ordre' where matricule='$matr'");
    $updatesete4=$bdd->query("UPDATE  b2017_2018 SET M_Decembre='En ordre' where matricule='$matr'");
    $updatesete5=$bdd->query("UPDATE  b2017_2018 SET M_Janvier='En ordre' where matricule='$matr'");
    $updatesete6=$bdd->query("UPDATE  b2017_2018 SET M_Fevrier='En ordre' where matricule='$matr'");
    $updatesete7=$bdd->query("UPDATE  b2017_2018 SET Mois_de_Mars='En ordre' where matricule='$matr'");
              
    
   $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
      
    $bdd->query("INSERT INTO finance values('',
                                            '$nom_cont',
                                            '$matr',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2006)")or die(print_r($bdd->errorInfo()));
              
      
    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Février',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nom_cont',
                                           '$matr',
                                           '$promo',
                                           'Mars',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2006)")or die(print_r($bdd->errorInfo()));         
           
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matr','dispo','$annacad','')");
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matr','dispo','$annacad','')");
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matr','dispo','$annacad','')");
    break;
    default:
    echo '<p style="color:red;">Inscription Non Prise en charge Au '.$mois_inscription.' Mois !</p>';
    exit();
  }
}
function RedirectionFacture(){
  global $bdd;
  global $matr;
  global $codfcat;
  global $taux;
  global $user;
  global  $nom_new;
  global  $postnom;
  global  $nomclasse;
  global  $nom_cont;
  global  $promo;
  global  $annacad;
  global  $Date_insciption;
  global $frais_insert;
  global $categorie_cl;
  global $compte;
  $nom_cont=$nom_new.' '.$postnom;
  $pid=2005;
  $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codfcat','frais demarrage','$frais_insert','0','$taux','1',now(),'USD','$matr','false','$pid',$compte)") or die(print_r($bdd->errorInfo));
header("location:validation_appoint.php?matricule=$matr");


}




    
