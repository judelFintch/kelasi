<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
/* veillez bien à vous connecter à votre base de données */
$term = $_GET['term'];
$requete = $bdd->prepare("SELECT DISTINCT motif FROM depense WHERE motif LIKE :term   " ); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));
$array = array(); // on créé le tableau
$array2 = array();
while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
  array_push($array2, $donnee['motif']); // et on ajoute celles-ci à notre tableau

}
echo json_encode($array2); // il n'y a plus qu'à convertir en JSON










