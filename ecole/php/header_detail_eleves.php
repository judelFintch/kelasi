<?php
 if (isset($_GET['id']) || (isset($_GET['matricule']))) {
	 if(empty($_GET['id'])){
    	$id='';
    }
    else{
    	$id=htmlentities($_GET['id']);
    }
     if(empty($_GET['matricule'])){
    	$matricule='';
    }
    else{
    	$matricule=htmlentities($_GET['matricule']);
    }
    $id =$id;
    $matricule=$matricule;
//fin verification code envoyer
 }

 if(isset($_GET['annee_scolaire'])){
 	$annacad=$_GET['annee_scolaire'];
 	$anciieneleve=false;
 }
 else{
 	  $annacad=$annacad;
 }

 //selection des informations liees a l eleves
 $requete = $bdd->query("SELECT * FROM eleve WHERE id='$id' or matricule='$matricule' and annacad='$annacad' ") or die(print_r($bdd-errorInfo()));
 //test d existance eleve
if( $requete->rowCount()== 0){
	 $requete = $bdd->query("SELECT * FROM eleve WHERE id='$id' or matricule='$matricule' ") or die(print_r($bdd-errorInfo()));
	     
	
}
if($requete->rowCount()>0){
	Annee_scolaireReel();
	if($annacad<>$annacad_reel){
			$anciieneleve=true;
	}
	else{
		$anciieneleve=false;
	}
	
	$resultat= $requete->fetch();
	$mat=$resultat['matricule'];
	$classe=$resultat['promotion'];
	$categorie=$resultat['categorie'];
	$selecetion_info_min=$bdd->query("SELECT montantmensuel FROM infomin where classe='$classe' and etat='$categorie' and annacad='$annacad' ");
	$min_mensuel=$selecetion_info_min->fetch();
	$annee_actuel=date('Y');
	$anne_naiss=substr($resultat['daten'],0,4);
	$age=$annee_actuel-$anne_naiss;

	$montantmensuelnormale=$min_mensuel['montantmensuel'];

	$nv_classe=$bdd->query("SELECT niveau FROM classe WHERE nomclasse='$classe'") or print_r($bdd->errorinfo());
        $niveau_casse=$nv_classe->fetch();
        $niveau_casse_r=$niveau_casse['niveau'];
        if($niveau_casse_r==16){
        	$div=0;
        }
        else{
        	$div=5;
        }

#####################algorithme augmentation#######################################################################################################
	$selection_mois=$bdd->query("SELECT moisp FROM mois WHERE matricule='$mat' and etat='dispo' and annee_acad='$annacad' order by id asc limit 1") ;
 //recuperation du mois
    $mois=$selection_mois->fetch();
    $moisverif=$mois['moisp'];
		 switch($moisverif){
		 case 'Janvier':
		 if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}

		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 $montantmensuelnormale_juin=$min_mensuel['montantmensuel'];
		 $conversioncdf_juin=$montantmensuelnormalecdf; 
		 break;
		 
		 case 'Fevrier':
		 if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}

		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $montantmensuelnormalecdf=$montantmensuelnormale*$taux;
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 $montantmensuelnormale_juin=$min_mensuel['montantmensuel'];
		 $conversioncdf_juin=$montantmensuelnormalecdf; 
		 break;

		  case 'Fevier':
		  if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 break;

		
		 
		 case 'Mars':
		  if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 
		 break;
		 
		 case 'Avril':
		  if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 
		 break;
		 
		 case 'Mai':
		  if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 
		 break;

		 case 'Mais':
		  if($div==0){
			$ajout=0;
		}
		else{
			$ajout=$montantmensuelnormale/$div;
		}
		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $ajout=$montantmensuelnormale/$div;
		 $montantmensuelnormale=$montantmensuelnormale+$ajout;
		 $conversioncdf=$montantmensuelnormale*$taux;
		 
		 break;
		 
		 default:

		 $montantmensuelnormale=$min_mensuel['montantmensuel'];
		 $conversioncdf=$montantmensuelnormale*$taux;
		 $montantmensuelnormale_juin=$min_mensuel['montantmensuel'];
		 $conversioncdf_juin=$montantmensuelnormale*$taux;
		 //var_dump($montantmensuelnormale);

			  	 
		 }

TestLevelSessionUser();

}
