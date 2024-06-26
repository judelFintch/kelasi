<?php
require_once('../bdd_app_gst_connect/allscirpt.inc.php');
  $bdd->exec("DELETE FROM tempons") or die(print_r($bdd->errorinfo()));
function ParametreMoisInscription($date){
  global $mois_inscription;
 //$mois_inscription=$date;
     $jour=substr($date,0,2);
     $mois=substr($date,3,2);
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
  
  $retour=ParametreMoisInscription(date('d-m-Y'));
  echo $retour;