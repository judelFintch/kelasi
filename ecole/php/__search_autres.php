<?php
 if(isset($_POST['searchGet'])){
    	require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
    	AffichagerSeatchElement(filtrageVariable($_POST['searchGet']));
    }
  function selectionTousExistence($rech){
  	global $bdd;
  	global $annacad;
  	$requete = $bdd->query("SELECT * FROM  finance where nom_eleve like('%$rech%') and  matricule='L0222'") or die(print_r($bdd->errorInfo()));
$allinformations=$requete->fetchAll();
return $allinformations;

  }
function AffichagerSeatchElement($rech){
$donnees=selectionTousExistence($rech);
global $annacad;
$n=0;
  $item='';
  $item.="
  <div class='table-responsive'>
  <table class='table   table-striped table-bordere '>
  <thead>
       <tr>
           <td>Nom </td>
           <td>Motif</td>
           <td>montant CDF</td>
           <td>Montant USD</td>
           <td>Date</td>
           <td>Type</td>
             <td>Facture</td>
    </thead>
           ";
  
  foreach ($donnees as $key) {
    $n++;
    $item .= "<tbody>
                  <tr>";
      $item .= "<td>".$key['nom_eleve']."</td>
                  <td>".$key['motif']."</td>
                  <td>".$key['montantcdf']."</td>
                  <td>".$key['montantusd']."</td>
                  <td>".$key['date_enreg']."</td>
                  <td>".$key['type']."</td>
                  <td>".$key['cdfact']."</td>
                  
                  
            ";

      $item .= "</tr></tbody>";
    }
   $item .= "</table></div>
   <hr>";
   echo $item;
 }