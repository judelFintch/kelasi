<?php
require_once('../../config/allscirpt.inc.php');
/* veillez bien à vous connecter à votre base de données */
$term = $_GET['term'];
$requete = $bdd->prepare("SELECT * FROM articles WHERE nom_article LIKE :term    " ); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));
$array = array(); // on créé le tableau
$array2 = array();
while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
  array_push($array2, $donnee['nom_article']); // et on ajoute celles-ci à notre tableau

}
echo json_encode($array2); // il n'y a plus qu'à convertir en JSON










