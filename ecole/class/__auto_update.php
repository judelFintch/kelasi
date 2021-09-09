<?php
function AutoUpdateMonth20162017($mois,$matricule){
	global $bdd;
	global $matricule;
	switch ($mois) {
          case 'Septembre':
            # code...
        $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_sep='En ordre' where matricule='$matricule'");
     
            break;


            case 'Octobre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Octobre='En ordre' where matricule='$matricule'");
                   break;

          case 'Novembre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Novembre='En ordre' where matricule='$matricule'");
     
            break;
          


          case 'Decembre':
            # code...

          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Decembre='En ordre' where matricule='$matricule'");


      
            break;
          


          case 'Janvier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Janvier='En ordre' where matricule='$matricule'");


          
            break;

            case 'Frevier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Fevrier='En ordre' where matricule='$matricule'");


          
            break;

            case 'Fevrier':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Fevrier='En ordre' where matricule='$matricule'");
          break;
            case 'Mars':
            # code...
           $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET Mois_de_Mars='En ordre' where matricule='$matricule'");


          
            break;

            case 'Avril':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Avril='En ordre' where matricule='$matricule'");


          
            break;
            case 'Mais':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Mais='En ordre' where matricule='$matricule'");


          
            break;

            case 'Mai':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Mais='En ordre' where matricule='$matricule'");


          
            break;



            case 'Juin':
            # code...
          $updatesete=$bdd->query("UPDATE situation_eleve20162017 SET M_Juin='En ordre' where matricule='$matricule'");


          
            break;

            
          
          
          default:
            # code...
            break;
        }

      
      }












