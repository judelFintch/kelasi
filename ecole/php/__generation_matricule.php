<?php
 require_once('../../config/allscirpt.inc.php');
  //affichage du matricule dans les inputs
   if(isset($_POST['matricule'])){
  	$mention=AttributionMatriculeAutomatiquement();
  	 echo $mention;
  }
   if(isset($_POST['mention'])){
  	$mention=ParametreMoisEjourInsciptions();
  	echo $mention;
  }
  //function Attribution Matricule
  function AttributionMatriculeAutomatiquement(){
      global $bdd;
       $requete_finance = $bdd->query("SELECT id FROM compt_inscription_reinscription ORDER BY id DESC LIMIT 1") or die(print_r($bdd->errorInfo()));
       $resultat_id = $requete_finance->fetch();
       $id=$resultat_id['id']+1;  
       $matricule = 'SLM'.date('y').''.$id;
       return $matricule;  
    }