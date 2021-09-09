<?php include('header.php'); ?>
</head>

<body>
<?php
$selection_classe=$bdd->query('SELECT DISTINCT  categorie_classe FROM classe');
while($lclasse=$selection_classe->fetch()){
echo'
<a class="btn btn-info" href="voir.php?categorie='.$lclasse['categorie_classe'].'"> '.$lclasse['categorie_classe'].'</a>  ';
}
				
if(isset($_GET['categorie'])){
$categorie_cl=$_GET['categorie'];
echo "<br><p><p>";

$selection_classe=$bdd->query("SELECT * FROM classe where categorie_classe='$categorie_cl' ");
while($lclasse=$selection_classe->fetch()){
echo' <a class="btn btn-info" href="voir.php?class='.$lclasse['nomclasse'].'"> '.$lclasse['nomclasse'].'</a>';
}
 };


if(isset($_GET['class'])){
	$rech = $_GET['class'];
	$n = 1;
	$requete = $bdd->query("SELECT * FROM eleve WHERE promotion='$rech'  and annacad='$annacad' and etat='disponible' order by nom asc");
	if($requete->rowCount()== 0){
		echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
	}
	else{
		echo '

<p><p>



		<table  class="table table-striped">
		    <th>N°</th>
		    <th>MATRICULE</th>
		    <th>NOM</th>
		    <th>POSTNOM</th>
		    <th>PRENOM</th>
		    <th>CLASSE</th>
		    <th>CODE PARENT</th>
		    <th>ADRESSE</th>';
		
	while ($resultat = $requete->fetch()){
		echo '
		<tr>
		<td>'.$n++.'</td>

		<td><a href="detail.php?id='.$resultat['id'].'">'.$resultat['matricule'].'</a></td>
		<td>'.$resultat['nom'].'</td>

		<td>'.$resultat['postnom'].'</td>

		<td>'.$resultat['prenom'].'</td>

		<td>'.$resultat['promotion'].'</td>


		<td>'.$resultat['codep'].'</td>

		<td>'.$resultat['adresse'].'</td></tr>';
	}
	
	echo '</table><br />';}
	}



	

	?>

  <?php include('footer.php');  ?>
 
