<?php
require_once('../bdd_app_gst_connect/allscirpt.inc.php');

    function verificationUser($login){
    	global $bdd;

        $requete = $bdd->prepare('SELECT * FROM user WHERE login = :login');
        $requete->bindParam(':login', $login);
        $requete->execute();
        $resultat = $requete->fetch();
		if($resultat == 0){
			echo 0;
		}
		else{
			echo 1;
		}
}

if(isset($_POST['user_login']) or !empty($_POST['user_login']) ){
	$login=$_POST['user_login'];
	
	verificationUser($login);
}