<?php
 if(isset($_POST['searchGet'])){
    	require_once('../../config/allscirpt.inc.php');
    	AffichagerSeatchElement(filtrageVariable($_POST['searchGet']));
    }
  function selectionTousExistence($rech){
  	global $bdd;
  	global $annacad;
  	$requete = $bdd->query("SELECT id,matricule,nom,prenom,promotion,categorie,adresse,postnom,etat,sexe FROM  eleve 
	                                                                                     WHERE 
	                                                                                      (annacad='$annacad')
	                                                                                      and(etat='disponible')

	                                                                                      and (

	                                                                                      nom like '$rech%'
                                                                                        or prenom like '$rech%'
	                                                                                      or matricule like'$rech%' 
	                                                                                      or postnom like'$rech%'
	                                                                                      or promotion like'$rech%' ) order by promotion,nom asc")or die(print_r($bdd->errorInfo()));
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
           <td>Post Nom</td>
           <td>Prenom</td>
           <td>Classe</td>
           <td>Sexe</td>
           <td>Operations</td>
    </thead>
           ";
  
  foreach ($donnees as $key) {
    $n++;
    $item .= "<tbody>
                  <tr>";
      $item .= "<td>".$key['nom']."</td>
                  <td>".$key['postnom']."</td>
                  <td>".$key['prenom']."</td>
                  <td>".$key['promotion']."</td><td>".$key['sexe']."</td>
                  <td><a href='situation.php?matr=".$key['matricule']." &&annacad=".$annacad."''>S. GENERALE </a>
            ";

      $item .= "</tr></tbody>";
    }
   $item .= "</table></div>
   <hr>";
   echo $item;
 }