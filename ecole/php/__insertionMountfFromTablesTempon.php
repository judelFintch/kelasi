<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
//informations des l eleves obtenu a l aide du matricule
function InformationEleve($matricule){
       	global $bdd;
       
      	$selection_informationEleve=$bdd->query("SELECT * FROM eleve WHERE matricule='$matricule' ");
      	$info_de_base=$selection_informationEleve->fetch();
      	return $info_de_base;
      	//$categorie_eleve=$info_de_base['categorie'];
  }
//Verification des elements liee a ventes
function InformationArticles($libelle){
	global $bdd;
	global $annacad;

	$informationArticles=$bdd->query("SELECT * FROM articles WHERE nom_article='$libelle'") or die(print_r($bdd->errorInfo()));
	$tabArticles=$informationArticles->fetch();
	return $tabArticles;
}
//affichage element du tempon 
function ElementTempons($matricule){
	global $bdd;
	$selection_information_tmp=$bdd->query("SELECT * FROM tempons WHERE matricule='$matricule' ");
	$donnees_tm=$selection_information_tmp->fetchAll();
	return $donnees_tm;
}

//function servant aupdate le stock
function insertionUpdateQte($idArt,$newStock){
	global $bdd;
	$insertion=$bdd->query("UPDATE articles SET qte='$newStock' WHERE id LIKE('$idArt')");
     return true;
}
//function information element appoint
function verificationFraisUnique($id){
	global $bdd;
	 $selection_frais=$bdd->query("SELECT * FROM unique_frais WHERE id='$id'")or die(print_r($bdd->errorInfo()));
	 $details=$selection_frais->fetch();
	 return $details;
}
//fin 
//Generation du code facture
function codefacture(){
	global $bdd;
	global $annacad;
	    $selection_numero_facture=$bdd->query(" SELECT DISTINCT code FROM tempons ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
		$facture=$selection_numero_facture->fetch();
		$codeVariable=$facture['code'];
		return $codeVariable;
}
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
//fin generation code facture
//Mis ajour de  la disponibilite du mois en etant dans le panier
function updateMounth($matricule,$mois,$numfact,$annacad){
	global $bdd;
	
	$udpate=$bdd->query("UPDATE mois SET etat='panier' where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo('ici')));
}
//Mis ajour definitif
function updateMounthOk($matricule,$mois,$numfact,$annacad){
	global $bdd;
	
	$udpate=$bdd->query("UPDATE mois SET etat='ok' where matricule='$matricule' and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo()));

	$udpate=$bdd->query("UPDATE mois SET cdfact='$numfact' where matricule='$matricule'  and moisp='$mois' and annee_acad='$annacad'") or die(print_r($bdd->errorInfo('ici')));
}
//insertion dans la table finance
function insertionFromFinance($noms,$matricule,$classe,$mois,$devise,$usd,$cdf,$numfact,$nature,$pid,$compte,$annacad_old,$qte){
	global $bdd;
	global $taux;
	global $annacad;
	$mois=filtrageVariable($mois);
	if($devise=='CDF'){
	$bdd->exec("INSERT INTO finance values('','$noms','$matricule','$classe','$mois','00','$cdf','$annacad',now(),'CDF','$nature','$taux','$numfact','$pid','$compte','$annacad_old','$qte')")or die(print_r($bdd->errorInfo()));
  }
   if($devise=='USD'){

	$bdd->exec("INSERT INTO finance values('','$noms','$matricule','$classe','$mois','$usd','00','$annacad',now(),'CDF','$nature','$taux','$numfact',$pid,'$compte','$annacad_old','$qte')")or die(print_r($bdd->errorInfo()));
  }

}
//Supression des elements constutuants le tampons
function deleteTmp($matricule){
	global $bdd;
	$success=true;
	$deleteTmp=$bdd->query("DELETE FROM tempons WHERE matricule='$matricule' ");
	return $success;
}
function InformationMinervale($classe,$categorie,$annacad){
  	   global $bdd;
  	  $selecetion_info_min=$bdd->query("SELECT montantmensuel,compte FROM infomin where classe='$classe' and etat='$categorie' and annacad='$annacad' ");
  	   $montantmensuelnormale=$selecetion_info_min->fetch();
  	   return $montantmensuelnormale;
   }
   //function insertion dans le tampons Autres frais
 function insertionElementTempons($id,$matricule,$annacad,$deviseUniqueFrais){
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
    
   if($deviseUniqueFrais==1){
    	if($devise=='CDF'){
    		$prix=$prix_cdf;
    	}
    	else{
    		$prix=$prix_usd;
    	}

    }
    
    else{

   	if($deviseUniqueFrais=='CDF' && $deviseUniqueFrais==$devise){
        $devise=$info_frais['devise'];
        $prix=$info_frais['prix_cdf'];

   }
   if($deviseUniqueFrais=='USD' && $deviseUniqueFrais==$devise){
        $devise=$info_frais['devise'];
        $prix=$info_frais['prix_usd'];

   }

  if($deviseUniqueFrais=='USD' AND $devise!='USD'){
   	$devise='USD';
   	$prix=$info_frais['prix_cdf']/$taux;

   }
   if($deviseUniqueFrais=='CDF' AND $devise!='CDF') {
   	 	$devise='CDF';
      	$prix=$info_frais['prix_usd']*$taux;
      	

   }

   $prix=$prix;
   $compte=$info_frais['compte'];
   $devise;
 }

  $prix;

  if($devise=="USD"){
	 $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture','$libelle','$prix','0','$taux','1',now(),'$devise','$matricule','Autres','$pid','$compte','$annacad')") or die(print_r($bdd->errorInfo));
     
}
	 else{
$insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture', '$libelle','0', '$prix','$taux', '1', now(), '$devise','$matricule','Autres','$pid','$compte','$annacad')") or die(print_r($bdd->errorInfo()));

   }

}
   //function insertion vente dans le tampons 
 function insertionElementTemponsVente($id,$libelle,$matricule,$qteAcheter,$annacad,$deviseUniqueArticle){
   	global $bdd;
   	global $taux;

   	$deviseUniqueArticle;
    $pid=$id;
   	$libelle=filtrageVariable($libelle);
   	$tabArticles=informationArticles($libelle);
   	$codefacture=Creationcodefacture();
    $devise=$tabArticles['devise'];

   if($devise==$deviseUniqueArticle){
      $devise=$tabArticles['devise'];
      $prix=$tabArticles['prix'];

   }
  if($deviseUniqueArticle=='USD' AND $devise!='USD'){
   	$devise='USD';
   	$prix=$tabArticles['prix']/$taux;

   } 
   if($deviseUniqueArticle=='CDF' AND $devise!='CDF') {
   	 	$devise='CDF';
      	$prix=$tabArticles['prix']*$taux;

   }

   else{
   	$devise=$tabArticles['devise'];
   	$prix=$tabArticles['prix'];

   }
   $prix=$prix*$qteAcheter;
   $compte=$tabArticles['compte'];
   $devise;

if($devise=="USD"){
	 $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture','$libelle','$prix','0','$taux','$qteAcheter',now(),'$devise','$matricule','Autres','$pid','$compte','$annacad')") or die(print_r($bdd->errorInfo));
     
}
	 else{
$insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('','$codefacture', '$libelle','0', '$prix','$taux', '$qteAcheter', now(), '$devise','$matricule','Autres','$pid','$compte','$annacad')") or die(print_r($bdd->errorInfo()));

   }
}
  //a reprogra;mmer
  function GestionInformation($mois,$matricule,$devise,$annacad){
 	global $taux;
 	global $bdd;
      	//Appel des fonction gerant les informations sur les frais et les identites des eleves
 	    $info_de_base=InformationEleve($matricule);
        $categorie=$info_de_base['categorie'];
        $classe=$info_de_base['promotion'];
        $montantmensuelnormale_bdd=InformationMinervale($classe,$categorie,$annacad);
      	$montantmensuelnormale=$montantmensuelnormale_bdd['montantmensuel'];
      	$compte=$montantmensuelnormale_bdd['compte'];
        //information classe
        $nv_classe=$bdd->query("SELECT niveau FROM classe WHERE nomclasse='$classe'") or print_r($bdd->errorinfo());
        $niveau_casse=$nv_classe->fetch();
        $niveau_casse_r=$niveau_casse['niveau'];
        if($niveau_casse_r==16){
        	$div=0;
        }
        else{
        	$div=5;
        }
      	$pid=4;
      	$codefacture=Creationcodefacture();
      	$codefacture;
        switch($mois){
		case 'Janvier':
		$montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
	    //code processus appoint
	    if($devise=="USD"){
          $montantmensuelnormale;
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule',
	      	                                                          'Frais appoint',
	      	                                                          '$pid',
	      	                                                          '$compte','$annacad')");
//updateMounth($matricule,$mois,$codefacture,$annacad);
          //echo 1;
}
	      else{

	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule',
	      	                                                          'Frais appoint',
	      	                                                          '$pid',
	      	                                                          '$compte','$annacad')");
//updateMounth($matricule,$mois,$codefacture,$annacad);
//echo 1;
}
        
		  		 
		 break;
		 
		 

		  case 'Mars':
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		 
	      if($devise=="USD"){
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{
	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;
		 
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		 
	      if($devise=="USD"){
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{
	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;

		  case 'Fevrier':
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		 
	      if($devise=="USD"){
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{
	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;
		 
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		 
	      if($devise=="USD"){
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{
	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;

		  case 'Avril':
		  $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		 
		
	      if($devise=="USD"){

	      $montantmensuelnormale;
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{

	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;

		 case 'Mai':
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		$montantmensuelnormale=$montantmensuelnormale+$ajout;
	    $conversioncdf=$montantmensuelnormale*$taux;
      	//fin appel
		
		 
	      if($devise=="USD"){

	      $montantmensuelnormale;
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{

	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }
		 
		 break;
		 
		 default:
		 $conversioncdf=$montantmensuelnormale*$taux;

		 $montantmensuelnormale_juin=$montantmensuelnormale;
		 
		 $conversioncdf_juin=$montantmensuelnormale*$taux;


		 if($devise=="USD"){

	      $montantmensuelnormale_juin;
	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '$montantmensuelnormale_juin',
	      	                                                          '0',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }



	      else{

	      $conversioncdf;

	      $insertion_info_usd=$bdd->query("INSERT INTO tempons VALUES('',
	      	                                                          '$codefacture',
	      	                                                          '$mois',
	      	                                                          '0',
	      	                                                          '$conversioncdf',
	      	                                                          '$taux',
	      	                                                          '1',
	      	                                                           now(),
	      	                                                          '$devise',
	      	                                                          '$matricule','Frais appoint','$pid','$compte','$annacad')");

	       updateMounth($matricule,$mois,$codefacture,$annacad); echo 1;


	      }

			  	 
		 }
 }
 function AutoUpdateMonth20162017($mois,$matricule,$annacad){
global $bdd;

 $mois = filter_var($mois, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
switch ($mois) {
          case 'Septembre':
            # code...
        $updatesete=$bdd->query("UPDATE bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Octobre':
            # code...
          $updatesete=$bdd->query("UPDATE bsituation SET M_Octobre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Novembre':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Novembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Decembre':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Decembre='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Janvier':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Janvier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Frevier':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Fevrier':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Mars':
          $updatesete=$bdd->query("UPDATE bsituation SET Mois_de_Mars='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Avril':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Avril='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Mais':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Mais='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Mai':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Mais='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
          case 'Juin':
          $updatesete=$bdd->query("UPDATE bsituation SET M_Juin='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
          break;
                default:
            # code...
            break;
        }
      
      }

function FactureApoint($matricule){
////gestion des affichages des factures de la tables tampons a la facture 
 	global $taux;
    $totalusd=0;
    $totalcdf=0;
    $informations_tempons= ElementTempons($matricule);
     $item="";
	foreach ($informations_tempons as $key) {
		$devise=$key['devise'];
		  if($devise=='CDF'){
		  	$unit=$key['prix_cdf']/$key['qte'];
		  }
		  else{
		  	$unit=$key['prix_usd']/$key['qte'];

		  }
    $item .= "<tr>";

			$item .= "<td>".$key['libelle']."</td>
			           <td>".$unit."</td>
			          <td>".$key['qte']."</td>
			          <td>".$key['prix_usd']."</td>
			          <td>".$key['prix_cdf']."</td>";

	$item .= "</tr>";
       $totalcdf+=$key['prix_cdf'];
       $totalusd+=$key['prix_usd'];
	}//end foreach

$conversioncdf=$totalusd*$taux;
$conversionusd=$totalcdf/$taux;
$netusd=round($totalusd+$conversionusd,1);
$netcdf=round($totalcdf+$conversioncdf,1);
	$item.="tr>";
	$item .= "<td></td><td></td><td></td><td> ".$totalusd." </td><td>  ".$totalcdf."</td>";
	$item.="</tr>";
	
	$item.="tr>";
	$item .= "<td>Tot</td>
	          <td> <b>".$netusd." </b></td>
	          <td>USD<td> <b>".$netcdf." </td> <td>CDF</b></td>";
	$item.="</tr>";
	$item.="tr>";
	$item .= "<td>Taux</td>
	          <td> ".$taux."</td>
	          <td></td>";
	$item.="</tr>";
    echo utf8_encode($item);
 }// end function
//Affichage des mois
if(isset($_POST['tmp'])){
  $item='';
  echo '<table class="table table-striped ">';
	$element_tmp=ElementTempons($_POST['tmp']);
	foreach ($element_tmp as $key) {
		# Affhage de mois insert dans le panier 
		  echo utf8_encode( '<tr><td>'.$key['libelle'].' <td>'.$key['qte'].' </td> <td>'.$key['prix_usd'].'</td> <td>'.$key['prix_cdf'].' </td></tr>  ');
	}

	echo '</table>';
}
//Traitement Affichage du total Panier
if(isset($_POST['tmp_tt'])){
	$cdf_tmp=0;
	$usd_tmp=0;
    $item='';
	$element_tmp=ElementTempons($_POST['tmp_tt']);
    if(!empty($element_tmp)){
	foreach ($element_tmp as $key) {
		$usd_tmp+=$key['prix_usd'];
		$cdf_tmp+=$key['prix_cdf'];
	}

      echo  utf8_encode('<p>Total  '.$usd_tmp.' USD | '.$cdf_tmp.' CDF</p>');
   }
   else{
   	echo 0;
   }
}
//uniquement pour l inscirption et la reinscription
 if(isset($_POST['codefactureAfficher'])){
 	extract($_POST);
 	$codefacture=codefacture($matricule);
 	$session=$_SESSION['codefacture']=$codefacture;
 	echo $session;
 }
 if(isset($_POST['matricule_facture'])){
	  $informations_eleves=FactureApoint($_POST['matricule_facture']);
}
if(isset($_POST['matricule_facture_nom'])){
	$informations_eleves=InformationEleve($_POST['matricule_facture_nom']);
	$nom_eleve=$informations_eleves['nom'].' - '.$informations_eleves['postnom'];
	$classe=$informations_eleves['promotion'];
	echo $informations=$nom_eleve.''.'('.$classe.')';
}
if(isset($_POST['mois']) AND isset($_POST['matricule']) AND isset($_POST['ChoixDevise'])){
 	GestionInformation($_POST['mois'],$_POST['matricule'],$_POST['ChoixDevise'],$_POST['annacad']);
  }
 if (isset($_POST['status'])){
 	# code...
  print_r($_POST);

 }
 //traitement autres frais
  if(!empty($_POST['id'])){
 	extract($_POST);
 	$frais_unique= insertionElementTempons($id,$matricule_autre,$annacad,$deviseUniqueFrais);
 	echo 1;
  }
 //traitement de vente articles
 if(isset($_POST['matricule_vente']) || !empty($_POST['matricule_vente'])){
 	extract($_POST);
 	$id=5;
        $libelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  	$deviseUniqueArticle;
 	insertionElementTemponsVente($id,$libelle,$matricule_vente,$qteAcheter,$annacad,$deviseUniqueArticle);
 	echo 1;
  };

  if(isset($_POST['valideOperation']) and isset($_POST['matricule'])){
 	$mois= ElementTempons($_POST['matricule']);
	$infobaseEleve=InformationEleve($_POST['matricule']);
 	$noms=$infobaseEleve['nom'].' '.$infobaseEleve['postnom'];
 	$classe=$infobaseEleve['promotion'];
 	$numfact=codefacture();
 	foreach ($mois as $key) {
 		# code...
 	 $mois=$key['libelle'];
 	 $devise=$key['devise'];
 	 $taux=$key['taux'];
 	 $usd=$key['prix_usd'];
 	 $cdf=$key['prix_cdf'];
 	 $nature=$key['nature'];
 	 $compte=$key['compte'];
 	 $qteAcheter=$key['qte'];
 	 $pid=$key['pid'];
 	 $annacad_old=$key['pour_annee'];
 	 if($nature=='Autres'){	
   	//deduction du stock de vente 
   	   // 1 extraction des information de l article
 	 	 if($compte==2007){
 	 	  $tabArticles=InformationArticles($mois);
          $qteEnStock=$tabArticles['qte'];
          $type=$tabArticles['type'];
          $idArt=$tabArticles['id'];
          $newStock=$qteEnStock-$qteAcheter;
          //false pour les article non comptable
		   if($type==false){

		   }
		   else{
		   insertionUpdateQte($idArt,$newStock);
		   }

		 }
 insertionFromFinance($noms,$_POST['matricule'],$classe,$mois,$devise,$usd,$cdf,$numfact,$nature,$pid,$compte,$annacad_old,$qteAcheter);
 	 }
 	 else if($nature=='false'){
 	  	//ici reflexion en cours
 	 }
 	 else{
 	 insertionFromFinance($noms,$_POST['matricule'],$classe,$mois,$devise,$usd,$cdf,$numfact,$nature,$pid,$compte,$annacad_old,$qteAcheter);
 	 AutoUpdateMonth20162017($mois,$_POST['matricule'],$annacad_old);
 	 updateMounthOk($_POST['matricule'],$mois,$numfact,$annacad_old);
 	
 	 }

 	}
 	deleteTmp($_POST['matricule']);
    $bdd->exec('INSERT INTO facture VALUES()');
    $bdd->exec('DELETE FROM tempons' );
  
 }


 



