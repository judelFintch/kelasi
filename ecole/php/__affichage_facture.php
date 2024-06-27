<?php
//class permettant de supprimer une facture et la mettre dans une corbeille
 require_once('../../config/allscirpt.inc.php');
  function recherDepense($codefacture){
  	global $bdd;
  	global $annacad;
  	//requette
 $resultatDepense=$bdd->query("SELECT * FROM depense WHERE code_sortie_s like('$codefacture')")
 or die(print_r($bdd->erroInfo()));
      $depenseDetails=$resultatDepense->fetchAll();
  return $depenseDetails;
 }
function rechercheFrais($codefacture){
	global $bdd;
  global $annacad;
	$selectFrais=$bdd->query("SELECT * FROM finance WHERE cdfact='$codefacture'")or die(print_r($bdd->erroInfo()));
	   
         $selectFrais=$selectFrais->fetchAll();
      
        return $selectFrais;
  }
 //lors de reception variable
 if(isset($_POST['codefacture'])){
 	$item="";
 	$codefacture=filtrageVariable($_POST['codefacture']);
 	$codefacture=strtoupper($codefacture);
 	//verification type facture
 	 if(substr($codefacture,0,1)=='D'){
 	 	$depense=recherDepense($codefacture);
 	 	if($depense==0){
 	 		echo 0;
 	 	}
 	 	else{
 	 	foreach ($depense as $key ) {
		           $item .= "
		           <table class='table table-striped table-bordered '>
		                <tr>";
                         $item .= "<td>".$key['id']."</td>
                         <td class='code'>".$key['code_sortie_s']."</td>
                         <td>".$key['motif_s']."</td><td>".$key['compte_s']."</td>
                         <td>".$key['montantcdf_s']."</td>
                         <td>".$key['montantusd_s']."</td>
                         <td>".$key['devise_s']."</td>
                         <td>".$key['date_s']."</td>";

		      $item .= "</tr>";
	    }
	   echo utf8_encode($item);
	    }
 	 }
 	 //si c est  un frais appoint
 	 if(substr($codefacture,0,1)=='S'){
 	    	$selection_facture=rechercheFrais($codefacture);
 	 	if($selection_facture==0){
 	 		  echo 0;
 	 	}
 	 	else{
     	 	foreach ($selection_facture as $key ) {
		           $item .= "
		           <table class='table table-striped table-bordered' 
		           <tr>";
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
     }
  }
 	
}
