<?php 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	      
	      header("Location:../index.php");}


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
#jn>select,input{
	width: 60%;
	margin-bottom:3%;
}
</style>
</head>

<body>
	<?php include('header.php'); ?>
		<article style="background-image:url(2.jpeg); background-size:100px 100%; border:1px solid grey;">
			<p align="center"><h2>Les &eacute;l&egrave;ves et le minerval</h2></p>
		
		<div class="row" style="bordere:1px solid black;">
			<div class="col-md-4" align="center">
				<h4>El&egrave;ves en ordre</h4><br />
				<form action="detaileleves.php" method="post" id="jn">
					<select name="ordre">
									<option value="sele">Select le mois</option>
									<option value="sept">Septembre</option>
									<option value="oct">Octobre</option>
									<option value="nov">Novembre</option>
									<option value="dec">D&eacute;cembre</option>
									<option value="jan">Janvier</option>
									<option value="fev">F&eacute;vrier</option>
									<option value="mars">Mars</option>
									<option value="avr">Avril</option>
									<option value="mai">Mai</option>
									<option value="juin">Juin</option>
								</select><br />
					<input type="submit" value="Afficher" class="btn btn-primary" />
				</form>
			</div>
			<div class="col-md-4" align="center">
				<h4>Suivi de Paiement</h4><br />
				<form action="suivi_de_payement.php" method="post" id="jn">
				<select name="classe">

				<?php $selection_de_classe=$bdd->query("SELECT nomclasse FROM classe "); ?>
									<?php while ( $liste_classe=$selection_de_classe->fetch()) {
										echo '<option value="'.$liste_classe['nomclasse'].'">'.$liste_classe['nomclasse'].'</option>';
									}
									?>
									
								</select><br />
					<input type="submit" value="Afficher" class="btn btn-primary" />
				</form>
			</div>
			<div class="col-md-4">
				<h4>El&egrave;ves insolvable</h4><br />
				<form action="detaileleves.php" method="post" id="jn">
					<select name="non">
									<option value="sele">Select le mois</option>
									<option value="sept">Septembre</option>
									<option value="oct">Octobre</option>
									<option value="nov">Novembre</option>
									<option value="dec">D&eacute;cembre</option>
									<option value="jan">Janvier</option>
									<option value="fev">F&eacute;vrier</option>
									<option value="mars">Mars</option>
									<option value="avr">Avril</option>
									<option value="mai">Mai</option>
									<option value="juin">Juin</option>
								</select><br />
					<input type="submit" value="Afficher" class="btn btn-primary" />
				</form>
			</div>
		</div><br />
		</article>
		</div>
		
		
<?php

	include("recherche.php");

	//pour les eleves en ordre

	if (isset($_POST['ordre'])) {
		$mois = $_POST['ordre'];
	if ($mois != "Select le mois") {
		
		$requete = $bdd->query("SELECT* FROM minerval WHERE mois='$mois' AND reste='0'");
			if($requete->rowCount() != 0){
				echo '<p style="color:red;" align="center">Mois pay&eacute; par aucun &eacute;l&egrave;ve!</p>';
			}
			else{
				$n = 0;
				echo '<table id="cont" style="background-color:white;" class="table table-bordered table-stripped table-condensed">

				<th>N°</th><th>MATRICULE</th><th>NOMS</th><th>MOIS</th><th>MONTANT</th><th>CLASSE</th><th>ANN. SCOL.</th><th>ACTION</th>';
					while ($resultat = $requete->fetch()) {
					echo '<tr><td>'.$n++.'</td><td>'.$resultat['mat'].'</td><td>'.$resultat['nom'].'</td><td>'.$resultat['mois'].'</td><td>'.$resultat['montant'].'</td><td>'.$resultat['classe'].'</td><td>'.$resultat['annacad'].'</td><td><a class="btn btn-primary" href="detail.php?id='.$resultat['id'].'">Payer</a></td></tr>';
					}
				echo '</table>';
				echo $resultat['mat'];
			}

		}
	}
	

	else{
		echo '<p style="color:orange;" align="center">Pas de mois!</p>';
	}

	//pour les eleves litigieux


	if (isset($_POST['litige'])) {
		$mois = $_POST['litige'];
	if ($mois != "Select le mois") {
		
		
		}
	}
	

	else{
		echo '<p style="color:orange;" align="center">Pas de mois!</p>';
	}

	//pour les eleves non en ordre


	if (isset($_POST['non'])) {
		$mois = $_POST['non'];
	if ($mois != "Select le mois") {
		
		
		}
	}
	

	else{
		echo '<p style="color:orange;" align="center">Pas de mois!</p>';
	}



?>
<?php include('footer.php');  ?>
