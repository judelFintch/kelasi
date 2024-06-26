<?php
function UpdateOldMonth($articles,$matricule,$annacad){
global $bdd;
   global $matricule;
      switch ($articles) {
      case 'Septembre':
             $updatesete=$bdd->query("UPDATE  bsituation SET M_sep='En ordre' where matricule='$matricule' AND anneescolaire='$annacad'");
             break;
             case 'Octobre':
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
