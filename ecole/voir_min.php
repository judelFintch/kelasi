<?php 
	session_start();
	 if(isset($_SESSION['user']) && $_GET['class']){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 	
	    $rech = $_GET['class'];
	 
	}
	 else{
	 header("Location:index.php");}

include ("connexion.php");
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
<font color="green"><center>Cherchez les eleves Selon un critaire</center>
<?php  
$selection_classe=$bdd->query('SELECT * FROM classe');
while($lclasse=$selection_classe->fetch()){
	echo' <a class="btn btn-info" href="voir_min.php?class='.$lclasse['nomclasse'].'"> '.$lclasse['nomclasse'].'</a>';}
					?>

</font><br><br>

<table>
       <form method="POST" class="form-inline">
         <tr>

            <td>
                 <label>RECHERCHE PAR VERSEMENT </label>
            </td>

             <td>
                  <select name = "mois" class="form-control">
                   <?php
                        $r=$bdd->query("SELECT distinct motif FROM  finance where classe_eleve='$rech'");
                        while($user=$r->fetch())
                        echo'<option>'.$user['motif'].'</option>';
                   ?>
                  </select>
             </td>

             <td>
                <input type="submit" value="Afficher" class="btn btn-default">
            </td>
       </tr>


</form>

</table>

<p></p>
<table>
       <form method="POST" class="form-inline">
         <tr>

            <td>
                 <label>RECHERCHE MOIS </label>
            </td>

             <td>
                  <select name = "mois" class="form-control">
                   <?php
                        $r=$bdd->query("SELECT distinct mois FROM  minerval where classe='$rech'");
                        while($user=$r->fetch())
                        echo'<option>'.$user['mois'].'</option>';
                   ?>
                  </select>
             </td>

             <td>
                <input type="submit" value="Afficher" class="btn btn-default">
            </td>
       </tr>


</form>
<p></p>
</table>

<p></p><p></p>
<table>
      <form method="POST" class="form-inline">
        <tr>
            <td>
                <label>RECHERCHE PAR  ELEVE</label>
            </td>

            <td>
                <select name="eleve" class="form-control">
                 <?php
                    $re=$bdd->query("select distinct  nom_eleve,matr,classe_eleve from finance where classe_eleve='$rech'");
                    while($date=$re->fetch())
                    echo'<option value="'.$date['matr'].'">'.$date['nom_eleve'].' ('.$date['classe_eleve'].' )'.$date['matr'].'</option>';
                 ?>

               </select>
             </td>
       



            <td>
               <input type="submit" value="Afficher" class="btn btn-default">
            </td>
        </tr>
    </form>

 </table>
<br>
</div> 

<?php
$n = 1;
$total1=0;
$total2=0;



if(isset($_POST['eleve'])){
  $mois_reche=$_POST['eleve'];

	$requete = $bdd->query("SELECT * FROM finance WHERE classe_eleve='$rech' and matr='$mois_reche'");
	if($requete->rowCount()== 0){
		echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
	}
	else{
		
		echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;"><th>N°</th>
		<th>MATRICULE</th>
		<th>NOM</th>
		<th>POUR </th>
		<th>CLASSE</th>
		<th>VERS EN USD</th>
		<th>VERS EN CDF</th>
		<th>CODE FACTURE</th>
		<th>ANNEE ACADEMIQUE</th>';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?id='.$resultat['matr'].'">'.$resultat['matr'].'</a></td>
		<td>'.$resultat['nom_eleve'].'</td>
		<td>'.$resultat['motif'].'</td>
		<td>'.$resultat['classe_eleve'].'</td>
		<td>'.$resultat['montantusd'].'</td>
		
		<td>'.$resultat['montantcdf'].' </td>
		<td>'.$resultat['anne_acad'].' </td>
		<td>'.$resultat['date_enreg'].' </td>

		
		</tr>';
		$total1+=$resultat['montantusd'];
		$total2+=$resultat['montantcdf'];
	}
	
	echo ' <td></td><td></td><td></td><td></td><td></td><td></td><td>'.$total1.' $ ('.$total2.' CDF)</td></table></table><br />';}
	}


else if(isset($_POST['mois'])){
$mois_reche=$_POST['mois'];

	$requete = $bdd->query("SELECT * FROM finance WHERE classe_eleve='$rech' and motif='$mois_reche'");
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
		<th>MONTANT</th>
		<th>NUMERO FACTURE</th>
		<th>ANNEE ACADEMIQUE</th>';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?id='.$resultat['matr'].'">'.$resultat['matr'].'</a></td>
		<td>'.$resultat['nom_eleve'].'</td>
		<td>'.$resultat['motif'].'</td>
		<td>'.$resultat['classe_eleve'].'</td>
		<td>'.$resultat['montantusd'].'</td>
		
		<td>'.$resultat['montantcdf'].' </td>
		<td>'.$resultat['cdfact'].' </td>
		<td>'.$resultat['date_enreg'].' </td>

		
		</tr>';
		$total2+=$resultat['montantcdf'];
		$total1+=$resultat['montantusd'];
	}
	
	echo ' <td></td><td></td><td></td><td></td><td></td><td></td><td>'.$total1.' $ ('.$total2.' CDF)</td></table></table><br />';}
	}


	




	?>

   <?php include('footer.php');  ?>
 
