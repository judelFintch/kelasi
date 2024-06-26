<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
//cette fonction nous permet de recuper la quantite en stock de  l article passer en stock
function verificationQte($idArt){
	global $bdd;
	 //execution de la requette sql permettant de selection la quantite en stock
	  $qteEnstockbdd=$bdd->query("SELECT qte FROM articles WHERE id LIKE('$idArt')") or die(print_r($bdd->errorInfo()));
	  $qteEnstock=$qteEnstockbdd->fetch();
	  return $qteEnstock;
}


function insertionUpdateQte($idArt,$newStock){
	global $bdd;
	$insertion=$bdd->query("UPDATE articles SET qte='$newStock' WHERE id LIKE('$idArt')");
	$insertion1=$bdd->query("UPDATE articles SET type=1 WHERE id LIKE('$idArt')");
     return true;
}


function informationArticle($idArt){
	global $bdd;
	 $infoArticleTab=$bdd->query("SELECT * FROM articles WHERE id='$idArt'")or die(print_r($bdd->errorInfo()));
	 $infoArticle=$infoArticleTab->fetch();
	 return $infoArticle;

}

function approArticle($idArt,$qte){
	global $bdd;
	global $date;
	global $user;
	  $infoArticle=informationArticle($idArt);
	 
	  	# code...
	  	$nomcart=$infoArticle['nom_article'];

	    $bdd->exec("INSERT INTO appro_article VALUES('','$nomcart','$date',$qte,'$user')")or die(print_r($bdd->errorInfo()));
	    
}
 
 if (isset($_POST['approQte'])) {
 	    extract($_POST);
 	    $qte=filtrageVariable($qte);
 	    $idArt=filtrageVariable($idArt);
 	    $qteEnstock=verificationQte($idArt);
 	    $oldQte=$qteEnstock['qte'];
 	    //cacul du nouveau stock
 	     $newStock=$oldQte+$qte;
 	     $updateQte=insertionUpdateQte($idArt,$newStock);
 	     $insertAppro=approArticle($idArt,$qte);
         echo true;   

 	    


 }


