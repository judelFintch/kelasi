<?php include('header.php'); ?>
<body>
<style type="text/css">
  a{
  text-decoration-style: none;

  }
</style>
<form method="post" class="form-inline" action="" >
	<fieldset><legend>RECHERCHE ELEVE</legend>
	<input type="text" name="matricule" required title="Champ" size="100" placeholder="Nom eleve" id="autocomplete2"  class="form-control" />
	<input type="submit" value="Rechercher" class="btn btn-info" />
</form>
<hr>
<script>$( "#autocomplete2" ).autocomplete({ source: 'php/__liste_reinscripton.php'});</script>
<?php

	if(!empty($_POST['matricule'])){
    $nom_eleve=$_POST['matricule'];
	$selection_matricule=$bdd->query("SELECT matricule FROM frais_insciption WHERE nom='$nom_eleve'")or die(print_r($bdd->errorInfo()));
	$matricule=$selection_matricule->fetch();
	if($selection_matricule->rowCount()==0){
		echo'<hr><div class="alert alert-danger"> <center>Aucune donnees Pour <b> '.$nom_eleve.'</b></a></center>';
	}
	else
	{
	$matricule=$matricule['matricule'];
    $selection_de_donnees_archve=$bdd->query("SELECT matricule,promotion,categorie,categorie_classe,annacad,codep from eleve where matricule='$matricule'")or die(print_r($bdd->errorInfo()));
    while($resultat=$selection_de_donnees_archve->fetch()){
					$one=$resultat['matricule'];            
                    $to=$resultat['promotion'];
                    $tree=$resultat['categorie'];
                    $four=$resultat['categorie_classe'];
                    $five=$resultat['annacad'];
                    $six=$resultat['codep'];
			}
echo "
<div class='row'>
     <div class='col-lg-6'>
         </div>
   <div class='col-lg-6'>
     <li class='list-group-item' >$nom_eleve | <b>$to</b> |   $five <b>| $one |</b> </li>
  </div>    
 </div>
 <hr> 


	<div class='col-lg-6'>
       <legend>Appoint litige</legend>
           <div class='list-group'>";
      $filtrage_scolaire=$bdd->query("SELECT DISTINCT annee_acad from mois where matricule='$matricule' order by id desc limit 1 ");
      $anne_academique=$filtrage_scolaire->fetch();
      $derniere_annee=$anne_academique['annee_acad'];
        $selection_mois_deja_payer=$bdd->query("SELECT * FROM mois  WHERE  annee_acad='$derniere_annee' and matricule='$matricule' and etat='dispo' ");
           while ($info_de_retour=$selection_mois_deja_payer->fetch()) {
echo '
      <li class="list-group-item">'. $info_de_retour['moisp'].' <span class="badge"> Litige   <?php echo $fille ?> </span> </li>
             
      ';
      }
      echo '</div>
      </div>

      <div class="col-lg-6" >
                 <legend>Situation Autres Frais</lenged>';
  $selection_autres=$bdd->query("SELECT cdfact,motif FROM finance WHERE
                                                   ( matricule='$matricule'  )  and (type='autres' or type='achat')   and (anne_acad='$derniere_annee' or anne_acad='$annacad')  ")or die(print_r($bdd->errorInfo()));
    if($selection_autres->rowCount()==0){    
      	}
      	else {
           while ($info_de_retour_autres=$selection_autres->fetch()) { 
      	    echo '
                 <li>'. $info_de_retour_autres['motif'].' </li>';
            
              }

      }
echo "</div>";
echo '
<div class="row">
<div class="col-lg-6"></div>

<div class="col-lg-6">
<hr>
<form action="validation_reinscription.php" method="post">
<input type="hidden" name="matricule" value="'.$matricule.'" readonly >
<button type="submit" class="btn btn-success">Valider la reinscription</button>
<button class="btn btn-success pull-right"><a href="detail.php?matricule='.$matricule.'&&annee_scolaire='.$five.'">Paiement Litige</a></button>
 </form>';
}
echo '

</div></div>
';
	}
	?>
	</fieldset>
	<hr>
	<?php include('footer.php');  ?>
