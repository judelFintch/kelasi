<?php
  require_once('../../config/allscirpt.inc.php');
//exectuction function mention
  if(isset($_POST['link'])){
  	extract($_POST);
     $nomeleve=$nom.' '.$postnom;
    //traitement inscription et reiscription
     //rest de liens si inscription ou reinscription
      if($link=='reinscription'){
         $mention=filtrageVariable($mention);
         $classe=filtrageVariable($classe);
         $sexe=filtrageVariable($sexe);
         $adresse=filtrageVariable($adresse);
         $pourcentage=filtrageVariable($pourcentage);
         $daten=filtrageVariable($daten);
         $categorie_paiement=filtrageVariable($categorie_paiement);
         $modePaiement=filtrageVariable($modePaiement);
         $reduction=filtrageVariable($reduction);
         $date_insc=filtrageVariable($date);
         //archivages des informations relatives a l annees passee
          archivageInformationEleve($matricule);
         //mis ajours des informations relative a cette annee  
          misAjoursInformationsEleve($matricule,$classe,$sexe,$adresse,$pourcentage,$categorie_paiement,$modePaiement,$mention,$link,$reduction,$daten);
      }
      else{
     $nom=filtrageVariable($nom);
     $postnom=filtrageVariable($postnom);
     $prenom=filtrageVariable($prenom);
     $lieun=filtrageVariable($lieun);
     $daten=filtrageVariable($daten);
     $sexe=filtrageVariable($sexe);
     $adresse==filtrageVariable($adresse);
     $provenance=filtrageVariable($provenance);
     $pourcentage=filtrageVariable($pourcentage);
     $mention=filtrageVariable($mention);
     $pays=filtrageVariable($pays);
     $photo=filtrageVariable($photo);
     $classe=filtrageVariable($classe);
     $categorie_paiement=filtrageVariable($categorie_paiement);
     $reduction=filtrageVariable($reduction);
     $modePaiement=filtrageVariable($modePaiement);
     $date_insc=filtrageVariable($date);
     $matricule=$matricule;
     $link;

      InsertionsDansLatableInscription($matricule,$nomeleve,$classe,$date,$reduction,$link);
      insertionInformationEleleve($nom,$postnom,$prenom,$lieun,$daten,$sexe,$adresse,$provenance,$pourcentage,$mention,$pays,$photo,$classe,$categorie_paiement,$modePaiement,$date,$matricule);
      }

    //execution insertion finance
      insertionInfomationFinance($nomeleve,$matricule,$classe,$reduction,$link); 
      insertionElevedansBsituation($matricule,$nomeleve,$classe);
     //recherche mois a inscrire
      $mois_inscription=ParametreMoisInscription($date_insc);
      gestionMoisAppointsEleves($matricule,$mois_inscription,$nomeleve,$classe,$date,$link,$reduction);
      //initialisaion du proccessus de suppression 

  }
 //filtrage de variable

  //insertions des informations dans la table inscriptions
  function InsertionsDansLatableInscription($matricule,$nomeleve,$classe,$date,$reduction,$link){
     $frais_insert=SelectionInformationPromotion($reduction,$classe);
     $codfcat=AttributionCodeFactureAutomatiquement($link);
     global $bdd;
     global $annacad;
     global $frais_insciption;
    $bdd->query("INSERT INTO frais_insciption VALUES('',
                                                     '$matricule',
                                                     '$nomeleve',
                                                     '$frais_insert',
                                                     '$classe',
                                                     '$annacad',
                                                     '$date',
                                                     '$codfcat')")or die(print_r($bdd->errorInfo()));
  }
  //insertions des informations de l eleves dans la table eleve
  function insertionInformationEleleve($nom,$postnom,$prenom,$lieun,$daten,$sexe,$adresse,$provenance,$pourcentage,$mention,$pays,$photo,$classe,$categorie_paiement,$modePaiement,$date,$matricule){
   global $bdd;
   global $annacad;
   global $user;
   $codep=0;
   //selection de la categorie classe
   $categorie_cl=SelectionCategorieClasse($classe);
  $bdd->query("INSERT INTO eleve VALUES('',
                                         '$matricule',
                                         '$nom',
                                         '$postnom',
                                         '$prenom',
                                         '$daten',
                                         '$lieun',
                                         '$pays',
                                         '$adresse',
                                         '$classe',
                                         '$codep',
                                         '$matricule',
                                         '$annacad',
                                         '$user',
                                         '$date',
                                         '$categorie_paiement',
                                         '$categorie_cl',
                                         'disponible',
                                         '$sexe',
                                         '$mention',
                                         '$pourcentage',
                                         '$provenance',
                                         '$modePaiement')")or die(print_r($bdd->errorInfo()));
  }
 function informationEleveEnreinscription($matricule){
  global $bdd;
  $selection_info_eleve=$bdd->query("SELECT * FROM eleve WHERE matricule='$matricule' ") or die(print_r($bdd->errorInfo()));
  $nfoEleve=$selection_info_eleve->fetch();
  return $nfoEleve;
 }

//cette fonction disponible seulement pour les eleves en reinscrription
  function misAjoursInformationsEleve($matricule,$classe,$sexe,$adresse,$pourcentage,$categorie_paiement,$modePaiement,$mention,$link,$reduction,$daten){
    global $bdd;
    global  $annacad;

      $classe;
    //recuperation de la categorie de la nouvelle classe
      $categorie_cl=SelectionCategorieClasse($classe);
      $frais_insert=SelectionInformationPromotion($reduction,$classe);
      $codfcat=AttributionCodeFactureAutomatiquement($link);

  $udpatefive=$bdd->query("UPDATE eleve SET promotion='$classe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpatesix=$bdd->query("UPDATE eleve SET categorie='$categorie_paiement' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpateseven=$bdd->query("UPDATE eleve SET annacad='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $one=$bdd->query("UPDATE eleve SET mention='$mention' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $to=$bdd->query("UPDATE eleve SET pourcentage='$pourcentage' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
  $udpateheigt=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_cl' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));

   /* $udpateheigt=$bdd->query("UPDATE eleve SET modePaiement='$modePaiement' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));*/
     $udpateheigt=$bdd->query("UPDATE eleve SET daten='$daten' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
$udpsatesexe=$bdd->query("UPDATE eleve SET sexe='$sexe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
         
     $udpate_fr_one=$bdd->query("UPDATE frais_insciption SET matricule='$matricule' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
      $udpate_fr_deux=$bdd->query("UPDATE frais_insciption SET montant='$frais_insert' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_trois=$bdd->query("UPDATE frais_insciption SET classe='$classe' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
           $udpate_fr_quatre=$bdd->query("UPDATE frais_insciption SET annee_scolaire='$annacad' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
           $udpate_fr_cinq=$bdd->query("UPDATE frais_insciption SET cdfact='$codfcat' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));

  }
//insertion informations dans la table finances liee a l eleve
function insertionInfomationFinance($nomeleve,$matricule,$classe,$reduction,$link){
   //recuperation information promotion
     $frais_insert=SelectionInformationPromotion($reduction,$classe);
     $compte=SelectionInformationPromotionCompte($classe);
     $codfcat=AttributionCodeFactureAutomatiquement($link);
     global $bdd;
     global $annacad;
     global $taux;
     $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$classe',
                                           'Frais Inscription',
                                           '$frais_insert',
                                           '000',
                                           '$annacad',
                                            now(),
                                           'USD',
                                           '$link',
                                           '$taux',
                                           '$codfcat',
                                           '1',
                                           '$compte',
                                           '$annacad',1)")or die(print_r($bdd->errorInfo()));
}
//function attribution code facture
function  AttributionCodeFactureAutomatiquement($inscription){
      global $bdd;
   $requete_finance = $bdd->query("SELECT id FROM facture ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
      $resultat_id = $requete_finance->fetch();
      $id=$resultat_id['id']+1;
      $intititiale="SLM";
      $codfcat=$intititiale.$id;
      return $codfcat; 
    }
//function parametre du mois
function ParametreMoisInscription($date){
  global $mois_inscription;
 //$mois_inscription=$date;
     $jour=substr($date,8,2);
     $mois=substr($date,5,2);
      //jour actuel
     $date_actuelle=date('d/m/Y');
     $jour_actuel=substr($date_actuelle,0,2);
     $mois_actuel=substr($date_actuelle,3,2);
     //if mois choisi est superieur au mois actuel
      if($jour>=25){
         $mois_inscription=$mois+1;
             if($mois_inscription==13){
              $mois_inscription=1;
             }
             else{
                $mois_inscription=$mois_inscription;;
             }
             //passe a true quand il s'agit du mois prochain
      }
      else{
        $mois_inscription=$mois;
      }
        return $mois_inscription;  
    }
    echo $mois_inscription;
//function information de la classe eleve
function  SelectionInformationPromotion($reduction,$promo) {
     global $bdd;   
    
     $selection_classe_prix=$bdd->query("SELECT frais_inscitpion,compte FROM classe where nomclasse='$promo'");
     $frais_recu_bb=$selection_classe_prix->fetch();
       if($frais_recu_bb['frais_inscitpion']>=$reduction){
             $frais_insert=$frais_recu_bb['frais_inscitpion']-$reduction; 
           }

      return $frais_insert;
    }
 function SelectionInformationPromotionCompte($promo) {
      global $bdd;    
     $selection_classe_prix=$bdd->query("SELECT compte FROM classe where nomclasse='$promo'") or die(print_r($bdd->errorInfo()));
     $frais_recu_bb=$selection_classe_prix->fetch();      
     $compte=$frais_recu_bb['compte'];
   return $compte;
     }
  function SelectionCategorieClasse($promo) {
      global $bdd;    
    $select_categorie_classe=$bdd->query("SELECT categorie_classe from classe where nomclasse='$promo'");
     $resultat_categorie=$select_categorie_classe->fetch();
     $categorie_cl=$resultat_categorie['categorie_classe'];
   return $categorie_cl;
     }
//function classe uplaod photo sur le serveur
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

//insertion information eleves pour les suivis des appoints
function insertionElevedansBsituation($matricule,$nomeleve,$classe){
  global $annacad;
  global $bdd;
  $insertion=$bdd->query("INSERT INTO bsituation (matricule,nom_eleve,classe,anneescolaire)VALUES('$matricule','$nomeleve', '$classe',
                               '2017-2018')");
}

function gestionMoisAppointsEleves($matricule,$mois_inscription,$nomeleve,$promo,$Date_insciption,$link,$reduction){
  global $annacad;
  global $bdd;
  global $taux;
  $codfcat=AttributionCodeFactureAutomatiquement($link);

    switch ($mois_inscription) {
        case 6:
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion2=$bdd->query("INSERT INTO mois values('','Octobre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion3=$bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion4=$bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion5=$bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion6=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion7=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion8=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion9=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion10= $bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
  case 7:    
   $insertion1= $bdd->query("INSERT INTO mois values('','Septembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Octobre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));  
    break;
    case 8:             
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Octobre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 9:  
    $insertion1=$bdd->query("INSERT INTO mois values('','Septembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Octobre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
     
    break;
    case 10:
    $updatesete=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $insertion=$bdd->query("INSERT INTO finance values('',
                                                      '$nomeleve',
                                                      '$matricule',
                                                      '$promo',
                                                      'Septembre',
                                                      '0',
                                                      '0',
                                                      '$annacad',
                                                      '$Date_insciption',
                                                      'AUCUNE',
                                                      '101',
                                                      '$taux',
                                                      '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Octobre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));

    
    break;
    case 11:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad' ");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
    
    $insertion1=$bdd->query("INSERT INTO mois values('','Novembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;

    case 12:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
      
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
          
    $insertion1=$bdd->query("INSERT INTO mois values('','Decembre','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo())); 
    break;
    case 1:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete4=$bdd->query("UPDATE  bsituation SET M_Decembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
  
    $insertion1=$bdd->query("INSERT INTO mois values('','Janvier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 2:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule'");
    $updatesete4=$bdd->query("UPDATE  bsituation SET M_Decembre='En ordre' where matricule='$matricule'");
    $updatesete5=$bdd->query("UPDATE  bsituation SET M_Janvier='En ordre' where matricule='$matricule'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
   
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));                
    $insertion1=$bdd->query("INSERT INTO mois values('','Fevrier','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 3:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete4=$bdd->query("UPDATE  bsituation SET M_Decembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete5=$bdd->query("UPDATE  bsituation SET M_Janvier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete6=$bdd->query("UPDATE  bsituation SET M_Fevrier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Février',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));          
   $insertion1= $bdd->query("INSERT INTO mois values('','Mars','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
   $insertion1= $bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')")or die(print_r($bdd->errorInfo()));
    break;
    case 4:
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete4=$bdd->query("UPDATE  bsituation SET M_Decembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete5=$bdd->query("UPDATE  bsituation SET M_Janvier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete6=$bdd->query("UPDATE  bsituation SET M_Fevrier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete7=$bdd->query("UPDATE  bsituation SET Mois_de_Mars='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
              
    
   $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Septembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Octobre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
      
    $bdd->query("INSERT INTO finance values('',
                                            '$nomeleve',
                                            '$matricule',
                                            '$promo',
                                            'Novembre',
                                            '0',
                                            '0',
                                            '$annacad',
                                            '$Date_insciption',
                                            'AUCUNE',
                                            '101',
                                            '$taux',
                                            '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));
              
      
    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Decembre',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));

    $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Janvier',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Février',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo())); 

                                           $bdd->query("INSERT INTO finance values('',
                                           '$nomeleve',
                                           '$matricule',
                                           '$promo',
                                           'Mars',
                                           '0',
                                           '0',
                                           '$annacad',
                                           '$Date_insciption',
                                           'AUCUNE',
                                           '101',
                                           '$taux',
                                           '$codfcat',2,2006,'$annacad',1)")or die(print_r($bdd->errorInfo()));         
           
    $insertion1=$bdd->query("INSERT INTO mois values('','Avril','$matricule','dispo','$annacad','')");
    $insertion1=$bdd->query("INSERT INTO mois values('','Mai','$matricule','dispo','$annacad','')");
    $insertion1=$bdd->query("INSERT INTO mois values('','Juin','$matricule','dispo','$annacad','')");
    $updatesete1=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete2=$bdd->query("UPDATE  bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete3=$bdd->query("UPDATE  bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete4=$bdd->query("UPDATE  bsituation SET M_Decembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete5=$bdd->query("UPDATE  bsituation SET M_Janvier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete6=$bdd->query("UPDATE  bsituation SET M_Fevrier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete7=$bdd->query("UPDATE  bsituation SET Mois_de_Mars='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    $updatesete7=$bdd->query("UPDATE  bsituation SET M_Avril='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
    break;
    default:
    echo '<p style="color:red;">Inscription non Prise en charge Au '.$mois_inscription.' Mois !</p>';
    exit();
  }
 //redirection  
  RedirectionFacture($matricule,$nomeleve,$promo,$link,$reduction);
}
function RedirectionFacture($matricule,$nomeleve,$classe,$link,$reduction){
  global $bdd;
  global $taux;
  global $annacad;
  $pid=1;
      $categorie_cl=SelectionCategorieClasse($classe);
      $frais_insert=SelectionInformationPromotion($reduction,$classe);
      $codfcat=AttributionCodeFactureAutomatiquement($link);
      $compte=SelectionInformationPromotionCompte($classe);
      //$bdd->exec('INSERT INTO facture VALUES()');
      $bdd->exec('INSERT INTO compt_inscription_reinscription VALUES()');
      $bdd->exec("DELETE FROM compt_inscription_reinscription ORDER BY id ASC LIMIT 1");

$insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codfcat','Frais demarrage','$frais_insert','0','$taux','1',now(),'USD','$matricule','false','$pid',$compte,'$annacad')") or die(print_r($bdd->errorinfo()));
  echo $matricule;
}


