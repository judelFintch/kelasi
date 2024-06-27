<?php
//
    if (isset($_POST['status'])){
    	# code...
    	 require_once('../../config/allscirpt.inc.php');


extract($_POST);
  $updateStatus=$bdd->query("UPDATE eleve SET etat='$status' WHERE matricule='$matricule_detail'  ")
  or die(print_r($bdd->errorInfo()));
  $insertion_archives=$bdd->query("INSERT INTO status_eleves VALUES('','$matricule_detail','$status','$annacad',now())")
   or die(print_r($bdd->errorInfo()));

   echo 'ok';

    	 

    }


