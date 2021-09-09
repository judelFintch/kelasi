<?php include('header.php');?> 
<body>
 <div class="row">
   <div class="col-lg-6">
   <legend>Creation Frais Appoint Classe</legend>
	   <form action="" method="post">
				<label for="code">Montant Totalité</label>
				   <input type="text" class="form-control montant"  required name="montant" /><br />
				<label for="code">Moitier Prix</label>
				   <input type="text" class="form-control montantM"  required name="montantM" /><br />
				<label for="code">Pris En charge</label>
				   <input type="text" class="form-control montantP"  required  name="montantP" /><br />
		        <label for="ens">Classe</label>
		         <select name="classe" class="form-control classe"  required>
					<option value="0">Selectionner une classe</option>
							<?php
                               $classe=selectionClasse();
                                foreach ($classe as $key) {
                                	# code...
                               echo'<option value="'.$key['nomclasse'].'">'.$key['nomclasse'].'</option>';
                                }

							?>
	          </select>
               <input type="hidden" value="2006"  id="compte" class="form-control"   name="compte">
               <label for="annacad">Anee Scolaire</label>
			   <select name="annacad" class="form-control"  required>
					<option value="Select anneeScolaire">--Année scolaire</option>
							<?php
                               $annee=annee_scolaireAll();
                                foreach ($annee as $key) {
                                	# code...
                               echo'<option value="'.$key['annee'].'">'.$key['annee'].'</option>';
                                }

							?>
	          </select>
				<input type="submit" name="creation" value="Cr&eacute;er classe" class="btn btn-success" /><br /><br /> 
			</form>
			<hr>
		</div>
		<div class="col-lg-6">
		<legend>Mis ajour Frais</legend>

		  <form action="" method="post">

				<label for="code">Montant Totalité</label>
				   <input type="text" class="form-control montant"  required name="montant" /><br />
				<label for="code">Moitier Prix</label>
				   <input type="text" class="form-control montantM"  required name="montantM" /><br />
				<label for="code">Pris En charge</label>
				   <input type="text" class="form-control montantP"  required  name="montantP" /><br />
		        <label for="ens">Classe</label>
		         <select name="classe" class="form-control classe"  required>
					<option value="0">Selectionner une classe</option>
							<?php
                               $classeinf=selectionClasseInfoMin();
                               echo $classeinf['classe'];

                                foreach ($classeinf as $key) {
                                	# code...
                               echo'<option value="'.$key['classe'].'">'.$key['classe'].' ['.$key['annacad'].'] ['.$key['montantmensuel'].' USD]</option>';
                                }

							?>
	          </select>
                <input type="hidden" value="2006"  id="compte" class="form-control"   name="compte">
                <label for="code">Anee Scolaire</label>
				<select name="annacad" class="form-control"  required>
					<option value="Select anneeScolaire">--Année scolaire</option>
							<?php
                               $annee=annee_scolaireAll();
                                foreach ($annee as $key) {
                                	# code...
                               echo'<option value="'.$key['annee'].'">'.$key['annee'].'</option>';
                                }

							?>
	          </select>          
				<input type="submit" name="update" value="Cr&eacute;er classe" class="btn btn-success" /><br /><br /> 
			</form>
			<hr>
		</div>
	</div>
</body>
<?php
 if(isset($_POST['update'])){
 	$annacad=$_POST['annacad'];
 	if (isset($_POST['montant'])){
     $montant=$_POST['montant'];
     $nomc = $_POST['classe'];   
     $update1=$bdd->query("UPDATE  infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Totalite'")or die(print_r($bdd->errorInfo()));    
 }

 if(isset($_POST['montantM'])){
 $montant=$_POST['montantM'];
 $nomc = $_POST['classe'];
 $update=$bdd->query("UPDATE infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Moitie'")or die(print_r($bdd->errorInfo()));

 }
 if(isset($_POST['montantP'])){
 $nomc = $_POST['classe'];
 $montant=$_POST['montantP'];
 $update=$bdd->query("UPDATE infomin SET montantmensuel='$montant' WHERE classe='$nomc' and etat='Pris en charge'")or die(print_r($bdd->errorInfo()));
 }
 echo "<center>Operation effectuee avec Succes</center>";

}

if (isset($_POST['creation'])){
$codan=false;
$annacad=$_POST['annacad'];
$montant=$_POST['montant'];
$nomc =$_POST['classe'];
$montantM=$_POST['montantM'];
$montantP=$_POST['montantP'];
$compte=$_POST['compte'];
$annacad=$_POST['annacad'];
if(isset($_POST['montant'])){
$insertion=$bdd->query("INSERT INTO infomin values('','$codan','$annacad','$montant','$nomc','Totalite','$compte') ");
}
if(isset($_POST['montantM'])){
$insertion=$bdd->query("INSERT INTO infomin values('','$codan','$annacad','$montantM','$nomc','Moitie','$compte') ");
}
if(isset($_POST['montantP'])){
$insertion=$bdd->query("INSERT INTO infomin values('','$codan','$annacad','$montantP','$nomc','Pris en charge','$compte') ");
}
echo "<center>Operation effectuee avec Succes</center>";
 }    	
else{
	
}
?>



<?php include('footer.php');  ?>	

<!--<script type="text/javascript" src="js/__gestion_update_and_creatMin.js"></script>-->