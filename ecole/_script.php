<?php
require_once('../bdd_app_gst_connect/allscirpt.inc.php');
 $i=0;
 
/*$matricules=$bdd->query("SELECT matricule,nom_eleve,classe_eleve FROM  finance WHERE anne_acad='2017-2018'  AND type='Inscription'");
      while ($tab=$matricules->fetch()) {
      	# code...
      	$i++;
       $matricule=$tab['matricule'];
       $nom_eleve=$tab['nom_eleve'];
       $classe=$tab['classe_eleve'];

    $insertion=$bdd->query("INSERT INTO bsituation (matricule,nom_eleve,classe,anneescolaire) VALUES('$matricule','$nom_eleve','$classe','2017-2018')");
     $bdd->query("INSERT INTO bsituation (nom) VALUES('nom_eleve') WHERE matricule in($matricule)");
      }*/
       
     
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");
     $selection=$bdd->query("SELECT motif,matricule FROM finance WHERE anne_acad='2017-2018' and type='Frais appoint' ");   
     while ($donnees=$selection->fetch()) {
      	# code...
      	$matriculer=$donnees['matricule'];
      	switch ($donnees['motif']) { 
      		case 'Septembre':
      			# code...
      	$updatesete=$bdd->query("UPDATE bsituation SET M_sep='En ordre' where matricule='$matriculer'") ;
      			break;
      			case 'Octobre':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Octobre='En ordre' where matricule='$matriculer'");
      			break;
      		case 'Novembre':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Novembre='En ordre' where matricule='$matriculer'");
      			break;
      		


      		case 'Decembre':
      			# code...

      		$updatesete=$bdd->query("UPDATE bsituation SET M_Decembre='En ordre' where matricule='$matriculer'");


      
      			break;
      		


      		case 'Janvier':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Janvier='En ordre' where matricule='$matriculer'");


      		
      			break;

      			case 'Frevier':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='En ordre' where matricule='$matriculer'");


      		
      			break;

      			case 'Fevrier':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Fevrier='En ordre' where matricule='$matriculer'");


      		
      			break;



      			case 'Mars':
      			# code...
      		 $updatesete=$bdd->query("UPDATE bsituation SET motif_de_Mars='En ordre' where matricule='$matriculer'");


      		
      			break;

      			case 'Avril':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Avril='En ordre' where matricule='$matriculer'");


      		
      			break;
      			case 'Mais':
      			# code...
      		$updatesete=$bdd->query("UPDATE bsituation SET M_Mais='En ordre' where matricule='$matriculer'");


      		
      			break;

      			case 'Mai':
      			# code...
      	  $updatesete=$bdd->query("UPDATE bsituation SET M_Mais='En ordre' where matricule='$matriculer'");


      		
      			break;



      			case 'Juin':
      			# code...
      	  $updatesete=$bdd->query("UPDATE bsituation SET M_Juin='En ordre' where matricule='$matriculer'");


      		
      			break;

      			
      		
      		
      		default:
      			# code...
      			break;
      	}

      
      }







##################recuperation 2016-2017

/*
      $i=0;
   $matricules=$bdd->query("SELECT matricule,nom_eleve,classe_eleve FROM  finance WHERE anne_acad='2016-2017'  AND type='Inscription'");
      while ($tab=$matricules->fetch()) {
        # code...
        $i++;
       $matricule=$tab['matricule'];
       $nom_eleve=$tab['nom_eleve'];
       $classe=$tab['classe_eleve'];

  
  $insertion=$bdd->query("INSERT INTO situation_eleve20162017 (matricule,nom_eleve,classe,anneescolaire) VALUES('$matricule','$nom_eleve','$classe','2016-2017')");
      //$bdd->query("INSERT INTO situation_eleve (nom) VALUES('nom_eleve') WHERE matricule in($matricule)");

   
  
    }

 /*  echo   $i;

  */

     //$selection=$bdd->query("SELECT motif,matricule FROM motif WHERE annacad='2016-2017' ");
       //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Septembre' ");
     //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Octobre' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Novembre' ");
     //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Decembre' ");
     //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Janvier' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Fevrier' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Frevier' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Mars' ");
       //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Avril' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Mais' ");
      //$selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Mai' ");
     // $selection=$bdd->query("SELECT motif,matricule FROM minerval WHERE annacad='2016-2017' and motif='Juin' ");
            
     /*while ($donnees=$selection->fetch()) {
        # code...

        $matriculer=$donnees['matricule'];





        switch ($donnees['motif']) {
          case 'Septembre':
            # code...

        $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_sep='En ordre' where matricule='$matriculer'");


        
            break;


            case 'Octobre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Octobre='En ordre' where matricule='$matriculer'");


        
            break;

          
                


          case 'Novembre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Novembre='En ordre' where matricule='$matriculer'");


      
            break;
          


          case 'Decembre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Decembre='En ordre' where matricule='$matriculer'");


      
            break;
          


          case 'Janvier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Janvier='En ordre' where matricule='$matriculer'");


          
            break;

            case 'Frevier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Fevrier='En ordre' where matricule='$matriculer'");


          
            break;

            case 'Fevrier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Fevrier='En ordre' where matricule='$matriculer'");


          
            break;



            case 'Mars':
            # code...
           $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET motif_de_Mars='En ordre' where matricule='$matriculer'");


          
            break;

            case 'Avril':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Avril='En ordre' where matricule='$matriculer'");


          
            break;
            case 'Mais':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Mais='En ordre' where matricule='$matriculer'");


          
            break;

            case 'Mai':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Mais='En ordre' where matricule='$matriculer'");


          
            break;



            case 'Juin':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Juin='En ordre' where matricule='$matriculer'");


          
            break;

            
          
          
          default:
            # code...
            break;
        }

      
      }

###############a executer en premier pour recuper les situation de minerval 2016-2017 ###################################
 

 








$reste=0;
$annacads='2016-2017';
/*
//$selection_information=$bdd->query("SELECT * FROM finance where motif='Septembre' and anne_acad='2016-2017'");
//$selection_information=$bdd->query("SELECT * FROM finance where motif='Octobre' and anne_acad='2016-2017'");
//$selection_information=$bdd->query("SELECT * FROM finance where motif='Novembre' and anne_acad='2016-2017'");
$selection_information=$bdd->query("SELECT * FROM finance where motif='Decembre' and anne_acad='2016-2017'");

while ($donnees=$selection_information->fetch()) {
  # code...


  $cdf=$donnees['cdfact'];
  $matricule=$donnees['matricule'];
  $nom=$donnees['nom_eleve'];
  $montantusd=$donnees['montantusd'];
  $montantcdf=$donnees['montantcdf'];
  $motif=$donnees['motif'];
  $classe=$donnees['classe_eleve'];
  $date=$donnees['date_enreg'];

  $taux=$donnees['taux'];
  $devise=$donnees['devise'];


  if($devise=='USD'){


 $insert_dans_la_tabe_finance=$bdd->query("INSERT INTO minerval
                    VALUES('','$cdf','$matricule','$nom','$montantusd','$motif','$classe','$annacads','$reste','$date','$taux','$devise') ");
}


else{

   $insert_dans_la_tabe_finance=$bdd->query("INSERT INTO minerval
                    VALUES('','$cdf','$matricule','$nom','$montantcdf','$motif','$classe','$annacads','$reste','$date','$taux','$devise') ");


}

}

*/





?>