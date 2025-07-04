<?php include('header.php'); 

$requete = $bdd->query("SELECT id FROM classe ORDER BY id DESC LIMIT 1");
if ($requete->rowCount() == 0) {
	$codeclasse = "C01";
}
else{
	$resultat = $requete->fetch();
	if($resultat['id']<=9){
		$val = $resultat['id']+1;
		$codeclasse = "C0".$val;
	}
	 else{
	 	$val = $resultat['id']+1;
	 	$codeclasse = "C".$val;
	 }
}
$requete = $bdd->query("SELECT id FROM attribution_classe ORDER BY id DESC LIMIT 1");
if ($requete->rowCount() == 0) {
	$codeattr = "ATTR01";
}
else{
	$resultat = $requete->fetch();
	if($resultat['id']<=9){
		$val = $resultat['id']+1;
		$codeattr = "ATTR0".$val;
	}
	 else{
	 	$val = $resultat['id']+1;
	 	$codeattr = "ATTR".$val;
	 }
}
$requete1 = $bdd->query("SELECT* FROM enseignant GROUP BY nomsens");
	if ($requete1->rowCount() == 0) {
		echo '<p align="center" style="color:orange;">Enregistrer d\'abord les enseignant</p>';
	}
	else{
		
	}
	 
?>


<body>
	
		<article style="background-image:url(2.jpeg); background-size:100px 100%; border:1px solid grey;">
			<p align="center"><h4>Remplissez ces champs</h4></p>
		
		<div style="margin-left:20%;" id="cl">
			<form action="detailclasse.php" method="post">
				<label for="code">CODE DE LA CLASSE</label><input type="text" name="codec" value="<?php echo $codeclasse; ?>" readonly /><br />
				<label for="nom">NOM DE LA CLASSE</label><input type="text" name="nomc" required /><br />
				<label for="nom">FRAIS INSCRIPTION</label><input type="text" name="frais" required /><br />
				<label for="nom">FRAIS MENSUEL TOTALITE</label><input type="text" name="frais_M" required /><br />
				<label for="nom">POUR MOITIER</label><input type="text" name="frais_Moitier" required /><br />
                <label for="nom">PRIS EN CHARGE</label><input type="text" name="frais_en_charge" required /><br />
                <label for="nom">CAPACITE</label><input type="text" name="capacite" required /><br />
                <label for="nom">CATEGORIE</label>
                <select name="categoriec">
					
					<option value="1">Selectionner une Categorie</option>
					<option>Maternele</option>
						<option>Primaire</option>
							<option>Secondaire</option>
						F
					</select><br />

				<!--<label for="ens">ENSEIGNANT(E)</label><select name="codeens" >
																<option value="Select">Select l'enseignant(e)</option>
														<?php
															/*while ($resultat1 = $requete1->fetch()) {
															echo'<option value="'.$resultat1['codeens'].'">'.$resultat1['nomsens'].'</option>';
															}*/
														?>
													  </select><br /><br />-->
				<label for="annacad">ANNEE SCOLAIRE</label><input type="text" name="annacad" value="<?php echo $annacad; ?>" required /><span style="color:white;">Modifier si necessaire</span><br /> 
				<label></label><input type="submit" value="Cr&eacute;er classe" class="btn btn-success" /><br /><br /> 
			</form>
		</div>
		</article>
		</div>
		
		
<?php
	
	if (isset($_POST['nomc']) and $_POST['categoriec']!=1) {

		$nomc = $_POST['nomc'];
		$codec =$_POST['codec'];
		$categoriec=$_POST['categoriec'];
		//$codeens = $_POST['codeens'];
		$annacad = $_POST['annacad'];
		$user = $_SESSION['user'];
	    $frais_inscription_classe=$_POST['frais'];
		$frais_M=$_POST['frais_M'];
		$frais_Moitier=$_POST['frais_Moitier'];
		$frais_en_charge=$_POST['frais_en_charge'];
		$capacite=$_POST['capacite'];

		$totalite='Totalite';
		$Moitier='Moitie';
		$pris_en_charge='Pris en charge';

		$requete = $bdd->query("SELECT * FROM classe WHERE codeclasse='$codec' OR nomclasse='$nomc'");

		/*if ($requete->rowCount() != 0) {
			echo '<p style="color:red;" align="center">La classe <strong>'.$nomc.'</strong> existe d&eacute;j&agrave;</p>';
		}
		//else{
			//$requete1 = $bdd->query("SELECT* FROM attribution_classe WHERE codeens='$codeens'");
			//if ($requete1->rowCount() != 0) {
				//echo '<p style="color:red;" align="center">L\'enseignant(e) est d&eacute;j&agrave; occup&eacute;(e)</p>';
	//}
		else{*/
			$code_annee="C".date('y').date('y')+1;

			######################################insertion de la classe dans la table classe#######################################
			
			$bdd->exec("INSERT INTO classe VALUES('','$codec','$nomc','$user','$frais_inscription_classe','$categoriec','$capacite',6,2005)");

			#######################mis en commentaire dde l attribution classe#############################################

			//$bdd->exec("INSERT INTO attribution_classe VALUES('','$codeattr','$codeens','$nomc','$annacad')");

			$bdd->exec("INSERT INTO infomin VALUES('','$code_annee','$annacad','$frais_M','$nomc','Totalite',2006)")or die(print_r($bdd->errorInfo()));
			$bdd->exec("INSERT INTO infomin VALUES('','$code_annee','$annacad','$frais_Moitier','$nomc','Moitie',2006)") or die(print_r($bdd->errorInfo()));
			$bdd->exec("INSERT INTO infomin VALUES('','$code_annee','$annacad','$frais_en_charge','$nomc','Pris en charge',2006)")or die(print_r($bdd->errorInfo()));
			echo '<p style="color:green;" align="center">Fait correctement!</p>';
		//}
	}


	//}
	

?>
<?php include('footer.php');  ?>
