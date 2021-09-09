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

#txt{
width:50%;}
#img,#txt{
display:table-cell;}
li{
	list-style-type: none;
}
</style>
</head>

<body>
	<?php include('header.php'); ?>
		
		
		
</body>
<br>
<font color="green"><center>Cherchez les eleves Selon un critaire</center></font><br>
<form method="POST" class="form-inline">
Par Classe:</td><td>
<select name = "mois" class="form-control">

<?php
$r=$bdd->query("SELECT distinct classe FROM  frais_insciption");
while($user=$r->fetch())
echo'<option>'.$user['classe'].'</option>';
?>
</select></td>
<td>Par date</td><td>
<select name="dat" class="form-control">
<option>tout</option>
<?php
$re=$bdd->query("select distinct date from minerval");
while($date=$re->fetch())
echo'<option>'.$date['date'].'</option>';
?>

</select></td>
<td><input type="submit" value="Afficher" class="btn btn-default"></td>
</tr></table>
</form>

<br>

 </div>> 

<?php

		
	$total1=0;
	$total2=0;

if(isset($_POST['mois'])){
	$n = 1;

    $mois_reche=$_POST['mois'];
	$requete = $bdd->query("SELECT * FROM frais_insciption WHERE classe='$mois_reche' ");
	if($requete->rowCount()== 0){
		echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
	}
	else{
		echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;"><th>N°</th>
		<th>MATRICULE</th>
		<th>NOM</th>
		<th>MOIS</th>
		<th>CLASSE</th>
		<th>RESTE MOIS</th>
		';
		while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?id='.$resultat['id'].'">'.$resultat['matricule'].'</a></td>
		<td>'.$resultat['nom'].'</td>
		
		<td>'.$resultat['classe'].'</td>

		<td>'.$resultat['montant'].' $</td>
		<td>'.$resultat['annee_scolaire'].'</td></tr>';
		$total1+=$resultat['montant'];
	}
	
	echo '<td></td><td></td><td></td><td></td><td> Total: '.$total1.' $</td></table><br />';}
	}
	
	else{


		$requete = $bdd->query("SELECT * FROM frais_insciption ");
	if($requete->rowCount()== 0){
		echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
	}
	else{
		$n = 1;
		echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;"><th>N°</th>
		<th>MATRICULE</th>
		<th>NOM</th>
		<th>CLASSE</th>
		<th>MONTANT</th>
		<th>ANNE SCOLAIRE</th>
		';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?id='.$resultat['id'].'">'.$resultat['matricule'].'</a></td>
		<td>'.$resultat['nom'].'</td>
		
		<td>'.$resultat['classe'].'</td>

		<td>'.$resultat['montant'].' $</td>
		<td>'.$resultat['annee_scolaire'].'</td></tr>';
		$total2+=$resultat['montant'];
	}
	
	echo '<td></td><td></td><td></td><td></td><td> Total: '.$total2.' $</td></table><br />';}
	}








	

	?>

   
 
<?php include('footer.php');  ?>