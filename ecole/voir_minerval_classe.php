<?php 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:index.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Accueil</title>
<?php include('liens_boostrap.php') ?>
<style type="text/css">
#hed,#re{
display:table-cell;
}
#he{
background-color:black;
color:royalblue;}
#img{
width:40%;}
#txt{
width:50%;}
#img,#txt{
display:table-cell;}
</style>
</head>

<body>
	<?php include('header.php'); ?>
		<article style="background-color:whitesmoke; border: 1px solid black; border-color:whitesmoke;">
			
			<fieldset><br>

                    <ul  class="list-group">
                    <a href="#" class="list-group-item active">	verification classe</a>
					<?php  

					$selection_classe=$bdd->query('SELECT * FROM infomin');

        while($lclasse=$selection_classe->fetch()){
        echo'<li class="list-group-item"><a href="voir_min.php?class='.$lclasse['classe'].'">'.$lclasse['classe'].' Frais Mensuel: '.$lclasse['montantmensuel'].' USD ('.$lclasse['montantmensuel']*$taux.' CDF) Categorie: '.$lclasse['etat'].'</a>
        <br></li>';}
					?>
				    </ul>
				   

</fieldset>
				




			</p>
		</article>
	</div>

<?php
	if(isset($_POST['rech'])){
	$rech = $_POST['rech'];
	$n = 1;
	$requete = $bdd->query("SELECT * FROM eleve WHERE nom='$rech' OR postnom='$rech' OR matr='$rech' OR codep='$rech'");
	if($resultat = $requete->fetch() == ""){
		echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
	}
	else{
		echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;"><th>N°</th><th>MATRICULE</th><th>NOM</th><th>POSTNOM</th><th>PRENOM</th><th>CODE PARENT</th><th>ADRESSE</th>';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td><td><a href="detail.php?id='.$resultat['id'].'">'.$resultat['matr'].'</a></td><td>'.$resultat['nom'].'</td><td>'.$resultat['postnom'].'</td><td>'.$resultat['prenom'].'</td><td>'.$resultat['codep'].'</td><td>'.$resultat['adresse'].'</td></tr>';
	}
	
	echo '</table>';}
	}
	
	else{
	}


?>
<?php include('footer.php');  ?>
