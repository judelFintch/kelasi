<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
function EffectuerUneDepense($montant,$motif,$devise,$compte,$nom,$numcompte,$date_op,$numcompte){
   	global $bdd;
   	global $date;
   	global $annacad;
    global $user;
   	$selection_id_depense=$bdd->query("SELECT id FROM depense order by id desc limit 1");
   	$id=$selection_id_depense->fetch();
   	$id='D'.$id['id'];
    $libelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $motif   = filter_var($motif, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $compte  = filter_var($compte, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom     = filter_var($nom, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					if($devise=="USD"){
			    $bdd->exec("INSERT INTO depense VALUES('','$id','$montant','00','$devise','$motif','$date_op','$annacad','$compte','$nom','1','$user','$numcompte')")or die(print_r($bdd->errorInfo()));
				
			    }
			    else{
$bdd->exec("INSERT INTO depense VALUES('','$id','00','$montant','$devise','$motif','$date_op','$annacad','$compte','$nom','1','$user','$numcompte')")or die(print_r($bdd->errorInfo()));
			
         }

}


if (isset($_POST['montant'])) { 
				$montant= htmlentities($_POST['montant']);
				$motif_dep= htmlentities($_POST['motif_dep']);
				$numcompte= htmlentities($_POST['compte']);
				$devise=htmlentities($_POST['devise']);
				$compte=htmlentities($_POST['compte']);
				$nom=htmlentities($_POST['nom_ben']);
				$date_op=$_POST['date_op'];
				$numcompte=$_POST['numcompte'];
				EffectuerUneDepense($montant,$motif_dep,$devise,$compte,$nom,$numcompte,$date_op,$numcompte);

				echo 1;
			}
