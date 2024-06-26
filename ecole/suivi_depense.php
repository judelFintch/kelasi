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
<title><?php echo $entete ?></title>
<link rel="stylesheet" media="all" href="bootst/bootstrap.css" />
<link rel="stylesheet" media="all" href="bootst/bootstrap.min.css" />
<link rel="stylesheet" media="all" href="bootst/bootstrap-theme.css" />
<link rel="stylesheet" media="all" href="bootst/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
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
                    <a href="#" class="list-group-item active">	Rapport depense du Jour <?php  echo $date;?></a>
					<?php 


					$selection_classe=$bdd->query("SELECT * FROM depense where date='$date'");

        while($lclasse=$selection_classe->fetch()){
        echo'<li class="list-group-item">
       <b>'.$lclasse['montant'].'  USD </b>|| POUR MOTIF: '.$lclasse['motif'].' ||EN DATE DU ('.$lclasse['date'].')
        <br></li>';

    }
				echo "Total ". $total_depense;;	
					?>

				    </ul>
				   

</fieldset>
				




			</p>
		</article>
	</div>
</body>
</html><br />

<?php
	include("connexion.php");
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
