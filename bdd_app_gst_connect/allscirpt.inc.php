<?php
require_once("connexion.php");
//$requette=$bdd->query("INSERT INTO bsituation  Select * from b2015_2015") or die(print_r($bdd->errorInfo()));
function salutation($id){
     $tabSalutation=array('Hi!','Hello!','Bonjour!','Jambo!','Comment allez-vous?');
     $tabSalutation[$id];
     return $tabSalutation[$id];
}
function numeberormat($number){
    $number = number_format($number, 2, ',', ' ');
    return $number;
}

setlocale(LC_TIME,'fr','fr_FR','UTF-8');
     function  TestLevelSessionUser(){ 
        global $ecriture;

         if($_SESSION['level']==6){

            $ecriture="readonly";
        }
        else{

             $ecriture="";
        }
        return $ecriture;
    }
function searcheEleves(){
    global $annacad;
    global $bdd;
    $aleatoireId=rand(1,1000);
     $search=$bdd->query("SELECT nom,postnom,prenom,matricule,promotion FROM eleve WHERE id='$aleatoireId'") or die($bdd->print_r($errorInfo()));
     $infoEleve=$search->fetch();
     return $infoEleve;
}
//fonction dynamique tables
  function dynamiqueTables($annescolaire){
    $subAnneeScolaireA=substr($annescolaire, 0,4);
    $subAnneeScolaireB=substr($annescolaire, 5,8);
    $concat=$subAnneeScolaireA.'_'.$subAnneeScolaireB;
    $dynamiqueTables='b'.$concat;
    return $dynamiqueTables;
  }
// Filtrage de variable
function filtrageVariable($string)
{
    if (ctype_digit($string)) {
        $string = intval($string);
    } else {
        $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $string = addcslashes($string, '%_');
    }

    return $string;
}
  function selectionClasse(){
    global $bdd;
    $classe=$bdd->query('SELECT nomclasse FROM classe order by niveau desc') or die(print_r($bbdd->errorInfo()));
    $classe=$classe->fetchAll();
    return $classe;
  }
function selectionClasseInfoMin(){
    global $bdd;
    $classe=$bdd->query('SELECT classe,annacad,montantmensuel FROM infomin order by id desc') or die(print_r($bbdd->errorInfo()));
    $classemin=$classe->fetchAll();
    return $classemin;
  }
function annee_scolaireAll(){
    global $bdd;
    $annescolaireAll=$bdd->query('SELECT annee FROM anne_scolaire order by id desc' ) or die(print_r($bbdd->errorInfo()));
    $annescolaireAll=$annescolaireAll->fetchAll();
    return $annescolaireAll;
  }

function Annee_scolaire(){
     global $annacad;
     global $bdd;
    $selection_anne_scolaire=$bdd->query("SELECT  annee from anne_scolaire order by id desc");
	$reception_anne=$selection_anne_scolaire->fetch();
    $annacad=$reception_anne['annee'];
    return $annacad;
    }

    function Annee_scolaireReel(){
    global $bdd;
    global $annacad_reel;
    $selection_anne_scolaire=$bdd->query("SELECT  annee from anne_scolaire order by id desc");
    $reception_anne=$selection_anne_scolaire->fetch();
    $annacad_reel=$reception_anne['annee'];
    return $annacad_reel;
    }

    

function Taux_du_jour(){
     global $taux;
     global $bdd;
	 $selection_du_taux=$bdd->query("SELECT taux FROM taux order by id desc LIMIT 1");
	 $taux_du_jour_bdd=$selection_du_taux->fetch();
	 $taux=$taux_du_jour_bdd['taux'];
	 return $taux;
	

	 }
function Date_et_heure_logiciel(){
	 	global $date;
	 	global $heure;
	 	$date=date('Y-m-d');
	    $int=date('H')+1;
        $heure=date($int.':i:s');
	    return $date;
	    return $heure;
	 }
$total_depense=0;
$total_depense_cdf=0;	    
###########instatiation des objets ####
    Annee_scolaire();
    Taux_du_jour();
    Date_et_heure_logiciel();
##########################
	 $selection_du_depense=$bdd->query("SELECT  montantusd_s,montantcdf_s FROM depense where date_s='$date'");
	 while($depense_du_jour_bdd=$selection_du_depense->fetch()){
	 $depense_jour_usd=$depense_du_jour_bdd['montantusd_s'];
	 $depense_jour_cdf=$depense_du_jour_bdd['montantcdf_s'];
	 $total_depense+=$depense_jour_usd;
	 $total_depense_cdf+=$depense_jour_cdf;
	 }
	 $total_depense;
     $total_depense_cdf;
	
	 $selection_entete=$bdd->query("SELECT * FROM info_application order by id  desc limit 1") or die(print_r($bdd->errorInfo()));
	 $info_entete=$selection_entete->fetch();
	 $entete=$info_entete['Entete'];
	 $Slogan=$info_entete['Sloga'];
     $select_nombre_eleve=$bdd->query("SELECT id from eleve WHERE annacad='$annacad' AND etat='disponible' ");
	 $comtpeur=0;
	 while ($count=$select_nombre_eleve->fetch()) {

	 	# code...
	 	$comtpeur++;
	 }
	 $garcon=0;
	 $fille=0;
     $abadon=0;
	 $select_abadon=$bdd->query("SELECT id from eleve WHERE  annacad='$annacad' and etat<>'disponible'");
	 while ($nombre_abondon=$select_abadon->fetch()) {
	 	$abadon++;

	 	# code...
	 }
     $select_fille=$bdd->query("SELECT id from eleve where sexe='F' and annacad='$annacad' and etat='disponible'");
     while ($nombre_fille=$select_fille->fetch()) {
        $fille++;

        # code...
     }
############################selection M###################################################
	 $select_garcon=$bdd->query("SELECT id from eleve where sexe='M' and annacad='$annacad' and etat='disponible'");
	 while ($nombre_garcon=$select_garcon->fetch()) {
	 	$garcon++;

	 	# code...
	 }

	$mont_usd=0;
    $mont_cdf=0;             
    $selection_montant=$bdd->query("SELECT montantcdf,montantusd FROM finance WHERE anne_acad='$annacad' and date_enreg IN('$date')  ");
    while ($resultat_argent=$selection_montant->fetch()){

     	# code...
     	$mont_usd+=$resultat_argent['montantusd'];
     	$mont_cdf+=$resultat_argent['montantcdf'];
     } 
     $comtpeur_derogation=0;
     $select_date_fin_dans_derogation=$bdd->query("SELECT date_fin FROM derogation where date_fin='$date' and annee_academique='$annacad'");
          if($select_date_fin_dans_derogation->rowCount()==0){

          }
          else{
          	while ($derogation=$select_date_fin_dans_derogation->fetch()) {
          		$comtpeur_derogation++;
          		# code...
          	}

          $udpatefive=$bdd->query("UPDATE derogation SET etat='inactif' WHERE date_fin='$date' and annee_academique='$annacad'") or die(print_r($bdd->errorInfo()));

        

         }

    $select_derogation_actif=$bdd->query("SELECT matricule,mois FROM derogation 
    	                                                   Where etat='actif' and annee_academique='$annacad'");
         while ($resultat=$select_derogation_actif->fetch()) {
         	$matricule=$resultat['matricule'];
         	$moisp=$resultat['mois'];
            $verification_etat_paiement=$bdd->query("SELECT * FROM mois where matricule='$matricule'
         	           	                                                            and annee_acad='$annacad'
         	           	                                        

         	           	                                         ");

         	             while ($statut=$verification_etat_paiement->fetch()) {
         	             	# code...
         	             	if($statut['moisp']==$moisp){
         	             		//$bdd->query("UPDATE derogation SET etat='inactif' WHERE matricule='$matricule'");
         	             	}

         	             	
         	             }

         }

?>

