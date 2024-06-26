<?php

require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
/* veillez bien à vous connecter à votre base de données */
$term = $_GET['term'];
$requete = $bdd->prepare("SELECT nomclasse FROM classe WHERE nomclasse LIKE :term order by nomclasse asc  " ); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => $term.'%'));
$array = array(); // on créé le tableau
while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
array_push($array, $donnee['nomclasse']); // et on ajoute celles-ci à notre tableau
}
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>






