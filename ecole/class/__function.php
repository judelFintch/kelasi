<?php
function Creation_compte_depense($comte,$detail){
        global $bdd;
      	$compte=htmlspecialchars($_POST['compte']);
				$detail=htmlentities($_POST['detail']);
				$selection_existance_compte=$bdd->query("SELECT compte FROM compte where compte='$compte'");
				if($selection_existance_compte->rowCount()==1){
					echo '<p style="color:green;" align="center">Le compte. '.$compte.' Saisi Eixste Déjà!</p>';
					exit();
				}
			  $bdd->exec("INSERT INTO compte  VALUES('','$compte')")or die(print_r($bdd->errorInfo()));
				echo '<p style="color:green;" align="center">Fait correctement!</p>';
				unset($compte);
				unset($detail);
			}
  
function Creation_Article($nomcart,$prix,$devise,$anne,$section,$compte,$type,$qte){
   	global $bdd;
    global $date;
    global $user;

		$bdd->exec("INSERT INTO articles VALUES('','$nomcart','$prix','$devise','$anne','$section','$compte','$type',$qte)")or die(print_r($bdd->errorInfo()));
       $bdd->exec("INSERT INTO appro_article VALUES('','$nomcart','$date',$qte,'$user')")or die(print_r($bdd->errorInfo()));

			echo '<div  class="alert alert-success" >Fait correctement!</div>';
		   }
function EffectuerUneDepense($montant,$motif,$devise,$compte,$nom,$numcompte,$date_op){
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
				echo '<p style="color:green;" align="center">Fait correctement!</p>';
				header("location:bon_de_sortie.php?montant=$montant&&motif=$motif&&devise=$devise&&compte=$compte&&nom=$nom&&code=$id");
			    }
			    else{
$bdd->exec("INSERT INTO depense VALUES('','$id','00','$montant','$devise','$motif','$date_op','$annacad','$compte','$nom','1','$user','$numcompte')")or die(print_r($bdd->errorInfo()));
				echo '<p style="color:green;" align="center">Fait correctement!</p>';
			header("location:bon_de_sortie.php?montant=$montant&&motif=$motif&&devise=$devise&&compte=$compte&&nom=$nom&&code=$id");
         }

}
function  EffectuerUneDerogationEleve(){
  $selection_information=$bdd->query("SELECT nom,postnom,promotion FROM eleve WHERE matr='$matricule' and annacad='$annacad' ") or die(print_r($bdd->errorInfo()));
	while ($resulta_info=$selection_information->fetch()) {
    $nom=$resulta_info['nom'].' '.$resulta_info['postnom'];
      
      $classe=$resulta_info['promotion'];
      $insertion_derogation=$bdd->query("INSERT INTO derogation VALUES('','$matricule','$nom','$classe','$mois','$datedebut','$datefin','actif','$annacad')") or die(print_r($bdd->errorInfo()));
			}			
	}
function SuppressionFacture($motif_suppression,$operation){
  global $bdd;
  global $annacad;
  global $motif_suppression;
  global $operation;
  global $libelle;
  global $type;
  global $code_sortie;
  global $devise;
  global $date;
  global $compte;
  global $effectuerPar;
  global $nom_recepteur;
  global $montant;
  global $pour;
  global $matr;
if(isset($_POST['numfactr'])){
                    $numfact=$_POST['numfactr'];
                   if(isset($_POST['matr'])){ $matr=$_POST['matr'];}
      if(substr($numfact,0,1)=='D'){
          $selection_information=$bdd->query("SELECT * FROM depense WHERE code_sortie in('$numfact') and annee_acad in('$annacad')");
                     
                        if($selection_information->rowCount()==0){

                           echo '<div class="alert alert-danger" id="cont"><center>La facture a deja etait supprimee</center></div>';

                    }
                       else{

                         $resultat=$selection_information->fetch();
                         $code_sortie =$resultat['code_sortie'];
                         $devise =$resultat['devise'];
                         $date =$resultat['date'];
                         $libelle=$resultat['motif'];
                         $compte=$resultat['compte'];
                         $effectuerPar=$resultat['effectuer_par'];
                          
                         $pour=$resultat['nom_recepteur'];
                         $type='depense';
                         if($devise=='USD'){
                          $montant=$resultat['montantusd'];

                         }
                         else{
                           $montant=$resultat['montantcdf'];

                         }

              InsertionElementsSuppressionCorbeille($code_sortie,$devise,$montant,$date,$effectuerPar,$compte,$libelle,$type,$pour);
                          # code...
               $delete_depense=$bdd->query("DELETE   FROM depense WHERE code_sortie in('$numfact')");

               echo '<div class="alert aler-success">Opertopm effectuer Avec Success</div>';

                             }
                    }
                    else{
    $selection_derniere_facture_eleve=$bdd->query("SELECT cdfact FROM finance WHERE matricule='$matr' order by id desc limit 1");
                    $old_code_fact=$selection_derniere_facture_eleve->fetch();
                    $old_cdf=$old_code_fact['cdfact'];
                    $taille_numero_facture=strlen($old_cdf);
                    $code_fc=substr($old_cdf,2);
                    $a_supprimer=substr($numfact,2);

                    if($code_fc<=$a_supprimer){
                    ########## Contrainte de supression facture############################################
                    $selection_de_facture=$bdd->query("SELECT anne_acad FROM finance WHERE cdfact='$numfact'");
                    $verification_annee=$selection_de_facture->fetch();
                    $old_annnee=$verification_annee['anne_acad'];
                    if($old_annnee==$annacad){
                    switch ($operation){
                   
                        case "delete":
                    	$initial_fac=substr($numfact,0,2);
                    	if($initial_fac=="FI"){
                        $suppression_eleve=$bdd->query("DELETE  FROM eleve WHERE matricule='$matr'")or die(print_r($bdd->errorInfo()));
                        $supp1_tout_facture=$bdd->query("delete  from   frais_insciption  where cdfact like '$numfact'  and  cdfact in (select  cdfact  FROM finance  WHERE type like ('Inscription'))")or die(print_r($bdd->errorInfo()));

                    	}

                        if($initial_fac=="FR"){

                        $recherche_des_information=$bdd->query("SELECT * FROM archives WHERE matr='$matr' order by id desc limit 1 ");
                        while($anciennes_information_eleve=$recherche_des_information->fetch()){
                            
                            $promotion=$anciennes_information_eleve['promotion'];
                            $categorie_classe=$anciennes_information_eleve['categorie_classe'];
                            $annacad=$anciennes_information_eleve['annacad'];
                            $date_inscription=$anciennes_information_eleve['date_inscripition'];
                            $categorie_eleve=$anciennes_information_eleve['categorie_eleve'];
                            $pourcentage=$anciennes_information_eleve['pourcentage'];
                            $mention=$anciennes_information_eleve['mention'];
                            $photo=$anciennes_information_eleve['photo'];

                    $udpatefive=$bdd->query("UPDATE eleve SET promotion='$promotion' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $udpatesix=$bdd->query("UPDATE eleve SET categorie='$categorie_eleve' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $udpateseven=$bdd->query("UPDATE eleve SET annacad='$annacad' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $one=$bdd->query("UPDATE eleve SET mention='$mention' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $to=$bdd->query("UPDATE eleve SET pourcentage='$pourcentage' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $udpatenine=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_classe' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $udpatten=$bdd->query("UPDATE eleve SET categorie_classe='$categorie_classe' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
                    $udpateeleve=$bdd->query("UPDATE eleve SET photo='$photo' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));



         // $udpate_fr_deux=$bdd->query("UPDATE frais_insciption SET montant='$frais_insert' WHERE matricule='$matricule'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_trois=$bdd->query("UPDATE frais_insciption SET classe='$promotion' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_quatre=$bdd->query("UPDATE frais_insciption SET annee_scolaire='$annacad' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
          $udpate_fr_cinq=$bdd->query("UPDATE frais_insciption SET date='$date_inscription' WHERE matricule='$matr'") or die(print_r($bdd->errorInfo()));
          $delete_dernier_enregistement=$bdd->query("DELETE FROM archives where matr='$matr' order by id desc limit 1");
         
                  $delete_dernier_enregistement_mois=$bdd->query("DELETE FROM mois where matricule='$matr' and cdfact='$numfact' ");
      
                        }
             }

  $supp_tout_facture=$bdd->query("delete  from autre_frais where cdfact like '$numfact' and cdfact in (select  cdfact  FROM finance  WHERE type in ('Achat','Autres'))")or die(print_r($bdd->errorInfo()));
    $update_mois=$bdd->query("update mois set   etat = 'dispo', cdfact =''  where cdfact like  '$numfact'  ")or die(print_r($bdd->errorInfo()));
                        $supp2_tout_facture=$bdd->query("delete  from 	minerval  where cdf like '$numfact' and cdf in (select  cdfact  FROM finance  WHERE type like ('Frais Appoint'))")or die(print_r($bdd->errorInfo()));
                        $suppression_facture=$bdd->query("DELETE  FROM finance WHERE cdfact='$numfact'")or die(print_r($bdd->errorInfo()));



                    	echo '<p style="color:green;" align="center" id="cont" class="alert alert-success">Fait correctement!</p>';

                    		break;
                    	
                    	case 'update':
                    	
					  	
                    	break;
                    		
                    }

                }
                else{


                       echo '<div class="alert alert-danger" id="cont" role="alert"><center>Code Facture non trouvee dans le systeme</center></div>';
                }


          }
            else{

             echo '<div class="alert alert-danger" role="alert"><center>Impossible de supprimer cette facture </center></div>';


           }


	    }






   }
}






   function InsertionElementsSuppressionCorbeille(){


  global $bdd;
  global $annacad;
  global $user;
  global $motif_suppression;

  global $libelle;
  global $type;
  global $code_sortie;
  global $devise;
  global $date;
  global $compte;
  global $effectuerPar;
  global $montant;
  global $pour;

  if($type=="depense"){


  $insertion_corbeille=$bdd->query("INSERT INTO corbeille 
                                                  
                         (id,motif,montant,date,pour,codefacture,type,libelle,effectuer_par,supprimerpar,devise,annacad) 

                        VALUES('',
                        '$motif_suppression',
                        '$montant',
                        '$date',
                        '$pour',
                       
                       
                        '$code_sortie',
                        '$type',
                        '$libelle',
                        '$effectuerPar',
                         '$user',
                         '$devise',
                         '$annacad'
                         ) ")
                         or die(print_r($bdd->errorInfo()));
                      


}

else{







}




   }
