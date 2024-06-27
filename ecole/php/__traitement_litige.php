<?php
require_once('../../config/allscirpt.inc.php');
   if(isset($_POST['litige'])){
    extract($_POST);
    $tabarticle=insertionAutresTempons($libelle,$matricule,$annacad_old);
   }

   if (isset($_POST['success'])){
    extract($_POST);
    FactureApoint($matricule_tmp);
}

if(isset($_POST['matricule_ap'])){
  extract($_POST);
  insertionMoisFromTempons($matricule_ap,$annacad_old,$libelle);
}
   //affichage element du tempon 
function ElementTempons($matricule){
  global $bdd;
  $selection_information_tmp=$bdd->query("SELECT * FROM tempons WHERE matricule='$matricule'");
  $donnees_tm=$selection_information_tmp->fetchAll();
  return $donnees_tm;
}

//fin generation code facture
//Mis ajour de  la disponibilite du mois en etant dans le panier
function updateMounth($matricule,$mois,$numfact){
  global $bdd;
  global $annacad;
  $udpate=$bdd->query("UPDATE mois SET etat='panier' where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo('ici')));
}
//Mis ajour definitif
   function FactureApoint($matricule){
////gestion des affichages des factures de la tables tampons a la facture 
  global $taux;
    $totalusd=0;
    $totalcdf=0;
    $i=0;
    $informations_tempons= ElementTempons($matricule);
     $item="";
     $item .= "<table class='table table-striped'> <tr>";
    $item .="<tr>
          <td>Nombre</td>
          <td>Libelle</td>
          <td>Entree USD</td>
          <td>Entree CDF</td>
          <td>Devise</td>
          <td>Compte</td>
          <td>Supprimer</td>
         </tr>";
foreach ($informations_tempons as $key) {
    $i++;
        $item .= " <td>".$i."</td>
                 <td>".$key['libelle']."</td>
                 <td>".$key['prix_usd']."</td>
                 <td>".$key['prix_cdf']."</td>
                 <td>".$key['devise']."</td>
                 <td>".$key['compte']."</td>
                 <td class='delete' value=".$key['compte']."><button class='btn delete'><img title='Effacer' src='img/module_notinstall.png'/></button></td>";

  $item .= "</tr>";
       $totalcdf+=$key['prix_cdf'];
        $totalusd+=$key['prix_usd'];
       
  }//end foreach
$conversioncdf=$totalcdf*$taux;
$conversionusd=$totalusd/$taux;
  $item.="<tr>";
  $item .= "<td></td><td>T. USD ".$totalusd."</td><td>T. CDF".$totalcdf."</td>";
  $item.="</tr>";
  $item.="<td><a href='validation_litige.php?matricule=".$matricule."'><button class='btn btn-success'>Valider</button></a></td>
<td><a href='delete_buy.php?delete=".$matricule."'><button class='btn btn-danger'>Annuler</button></a></td>
</tr>";
    echo utf8_encode($item);

 }// end function
//Affichage des mois
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
    
function verificationFraisUnique($id){
  global $bdd;
   $selection_frais=$bdd->query("SELECT * FROM unique_frais WHERE id='$id'")or die(print_r($bdd->errorInfo()));
   $details=$selection_frais->fetch();
   return $details;
} 

function insertionAutresTempons($id,$matricule,$annacad_old){   
    global $bdd;
    global $taux;
    $info_frais=verificationFraisUnique($id);
    $codefacture=Creationcodefacture();
    $libelle=filtrageVariable($info_frais['libelle']);
    $prix_usd=$info_frais['prix_usd'];
    $prix_cdf=$info_frais['prix_cdf'];
    $devise=$info_frais['devise'];
    $compte=$info_frais['compte'];
    $pid=$info_frais['id'];
    if($info_frais['devise']=="USD"){
   $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture','$libelle','$prix_usd','0','$taux','1',now(),'$devise','$matricule','Autres','$pid','$compte','$annacad_old')") or die(print_r($bdd->errorInfo));
     
}
   else{
$insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture', '$libelle','0', '$prix_cdf','$taux', '1', now(), '$devise','$matricule','Autres','$pid','$compte','$annacad_old')") or die(print_r($bdd->errorInfo()));


    }

    echo true;
 }   
function insertionMoisFromTempons($matricule,$annacad_old,$libelle){
   global $bdd;
   global $taux;
      $selection_categorie_enfant=$bdd->query("SELECT categorie,promotion FROM eleve WHERE matricule='$matricule'");
      $info=$selection_categorie_enfant->fetch();
      $categorie=$info['categorie'];
      $classe=$info['promotion'];
      $verification_article=$bdd->query("SELECT * FROM infomin WHERE annacad='$annacad_old' and classe='$classe' and etat='$categorie'");
      $min_mensuel=$verification_article->fetch();
      $codefacture=Creationcodefacture();

     $min_mensuel['montantmensuel'];
     $compte=$min_mensuel['compte'];
     switch($libelle){
     case 'Janvier':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
      
     break;
     
     case 'Frevier':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     
     break;

      case 'Fevrier':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     
     break;
     
     case 'Mars':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     
     break;
     
     case 'Avril':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     
     break;
     
     case 'Mai':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     
     break;

     case 'Mais':
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $ajout=$montantmensuelnormale/5;
     $montantmensuelnormale=$montantmensuelnormale+$ajout;
     $conversioncdf=$montantmensuelnormale*$taux;
     break;
     default:
     $montantmensuelnormale=$min_mensuel['montantmensuel'];
     $conversioncdf=$montantmensuelnormale*$taux;
        
     
     }
         $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
                                                                    '$codefacture',
                                                                    '$libelle',
                                                                    '$montantmensuelnormale',
                                                                    '0',
                                                                    '$taux',
                                                                    '1',
                                                                     now(),
                                                                    'USD',
                                                                    '$matricule',
                                                                    'Frais appoint',
                                                                    '2',
                                                                    '$compte','$annacad_old')");
         updateMounth($matricule,$libelle,$codefacture); echo true;
 }
function affichagePanier(){
  global $taux;
$selection_article=$bdd->query("SELECT id FROM  tempons order by id desc limit 1");
$resultat=$selection_article->fetch();
if(!empty($resultat['id'])){
echo '
<table class="table table-striped">
 <tr>
 <td>Nombre</td>
 <td>Libelle</td>
 <td>Quantité</td>
 <td>Entree CDF</td>
 <td>Entree USD</td>
 <td>Total CDF</td>
 <td>Total USD</td>
 <td>Devise</td>
 <td>Taux</td>
 <td>Supprimer</td>
 </tr>             
';
$total=0;
$totalusd=0;
$nbr=0;
$reponse=$bdd->query("select * from tempons  order by id desc limit 50");
while($val=$reponse->fetch()){
  $nbr++;
  echo'
  <tr>
  <td>'.$nbr.'</td>
  <td>'.$val['libelle'].'</td>
  <td>'.$val['qte'].'</td>
  <td>'.$val['prix_cdf'].'</td>
  <td>'.$val['prix_usd'].'</td>
  <td>'.$val['prix_cdf']*$val['qte'].'</td>
  <td>'.$val['prix_usd']*$val['qte'].'</td>
  <td>'.$val['devise'].'</td>
  <td>'.$val['taux'].'</td>
  <td><a href="autre_frais.php?id='.$val['id'].'&&matr='.$val['matricule'].'"<span class="cross" style="color: red;"> Effacer</span></a></td>
  </tr>
  ';
  $matr=$val['matricule'];
  $total+=$val['prix_usd']*$val['qte'];
  }
 //$cryptage_fact=md5($fact);
echo '<tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Net A payer <b>'.$total.'</b> USD</td>
      <td>Net  '.round($total*$taux,1).' CDF</td>

   </tr>
<tr>
<td><a href="validation_litige.php?matricule='.$matr.'"><button class="btn btn-success">Valider</button></a></td>
<td><a href="delete_buy.php?delete='.$matr.'"><button class="btn btn-danger">Annuler</button></a></td>
</tr>
';
}

}

?>

