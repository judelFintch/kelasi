<?php include('header.php'); ?><?phpif(isset($_SESSION['session_temporaire'])){}else{exit();}?>
<body>	
				<p id="lien"><ul  class="list-group">
				<a href="#" class="list-group-item list-group-item-success"><h3>Opérations Classe</h3> </a>
					<li class="list-group-item"><a href="detailclasse.php">Cr&eacute;er une classe</a></li>
					<li class="list-group-item"><a href="#">Modifier une classe</a></li>
					<li class="list-group-item"><a href="capacite_classe.php">Configuration capacité Classe</a></li>
					<li class="list-group-item"><a href="attribution.php">Attribution Enseignant</a></li>
					<li class="list-group-item"><a href="creerens.php">Enregistrer un(e) enseignant(e)</a></li>
				</ul>
			  </p>
				<p id="lien"><ul  class="list-group">
				<a href="#" class="list-group-item list-group-item-success"><h3>Opérations Eleve</h3> </a>
					<li class="list-group-item"><a href="">Modification Information</a></li>
					<li class="list-group-item"><a href="">Releves</a></li>
					<li class="list-group-item"><a href="">Parents</a></li>
					<li class="list-group-item"><a href="">Cursus Scolaire</a></li>
				</ul></p>
				<p id="lien"><ul class="list-group">
				<a href="#" class="list-group-item list-group-item-success"><h3>Finances</h3> </a>
					<li class="list-group-item"><a href="detaileleves.php"> Suivi des Minervals Par Classe</a></li>
					
			<?php if($_SESSION['level']==6){
           	 echo'<li class="list-group-item"><a href="min_nouvelle_annee.php">Modification Frais Appoints</a></li>';}?>
					
					
<?php  				
if($_SESSION['level']==6){	echo '
					
					<li class="list-group-item"><a href="operaton_facture.php">Operation Sur la Facture</a></li>';


				}
?>
					<li class="list-group-item"><a href="gestion_taux.php">Configuration Taux </a></li>
					
					
				</ul></p>

<?php  
if($_SESSION['level']==6){	echo '
				
				<p id="lien"><ul class="list-group">
				<a href="#" class="list-group-item list-group-item-success"><h3>Autres</h3> </a>
					

				<li class="list-group-item"><a href="compte.php">Compte depense</a></li>
					
					
				</ul></p>';

				}
?>

<?php  
if($_SESSION['level']==8){	echo '


				<p id="lien"><ul class="list-group">
				<a href="#" class="list-group-item list-group-item-success"><h3>Parametrage Application </h3></a>
					<li class="list-group-item"><a href="entete.php">Infomation Ecole</a></li>
					
					
				</ul></p>';
}
?>
		
		
		
		
		
		


<?php
	
	include("recherche.php");
	include('footer.php');

?>
