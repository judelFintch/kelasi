

<?php
  require_once("../bdd_app_gst_connect/connexion.php");



       ####### Fuction Statistique eleves par Section ############
  ;
      /*function Statistique_eleve(){
      	global $bdd;
      	global $maternele;
      	global $secondaire;
      	global $primaire;
      	global $count_maternelle;
      	global $count_primaire;
      	global $count_secondaire;

      	$requete = $bdd->query("SELECT * FROM eleve ");


       $count_maternelle=0;
       $count_primaire=0;
       $count_secondaire=0;

        $statistique_maternelle=$bdd->query('SELECT id FROM eleve WHERE categorie_classe in ("$maternele")');
        while ($statistique_maternelle=$statistique_maternelle->fetch()) {
        	# code...
        $count_maternelle++;
        }


        $statistique_primaire=$bdd->query('SELECT id FROM eleve WHERE categorie_classe="$primaire"');
        while ($statistique_primaire=$statistique_primaire->fetch()) {
        	# code...
        	$count_primaire++;
        }



        $statistique_secondaire=$bdd->query("SELECT * FROM eleve order by id desc ");
        while ($statistique_secondaire=$statistique_secondaire->fetch()) {
        	# code...
        	 $count_secondaire++;
        }

        return $count_maternelle;
        return $count_primaire;
        return $count_secondaire;

       }*/



      //Statistique_eleve();





       ##############################################################




