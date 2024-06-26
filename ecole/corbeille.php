<?php ob_start(); include('header.php'); ?>
<?php  include_once('class/__function.php');?>
<body>
<form action="" method="post" class="form-inline" id="jn" name="form-one">
                <label>Date du debut: </label><input type="date" name="date_debut" class="form-control">
                <label> Date de fin: </label><input type="date" name="date_fin" class="form-control">
                <input type="hidden" name="type" value="insolvable">
          <input type="submit" value="Afficher" name="btn-one" class="btn btn-primary" />
        </form>
        <hr>
<table class="table table-stripped">
<tr> 
    <td>N</td>
    <td>Libelle</td>
    <td>Code Operation</td>
    <td>Type</td>
    <td>Motif</td>
    <td>Date</td>
    <td>Supprimer le</td>
</tr>
<?php
$n=0;
if(isset($_POST['date_debut']) and isset($_POST['date_fin'])){
	$date_debut=$_POST['date_debut'];
	$date_fin=$_POST['date_fin'];
$corbeille=$bdd->query("SELECT * FROM corbeille WHERE date BETWEEN '".$date_debut."' AND '".$date_fin."' ORDER BY id DESC ");
}
else{
$corbeille=$bdd->query("SELECT * FROM corbeille ORDER BY id DESC LIMIT 20");
}
$variable=$corbeille->fetchAll();
foreach ($variable as $key) {
	# code...
	$n+=1;
	 echo'<tr>
           <td>'.$n.'</td>
	      <td>'.$key['libelle'].'</td>
	      <td><b>'.$key['codefacture'].'</b></td>
	      <td>'.$key['type'].'</td>
	      <td>'.$key['motif'].'</td>
	      <td>'.$key['date'].'</td>
	      <td>'.$key['date'].'</td>
        </tr>';
}
 
?>	
 </table>
</body>
<?php include('footer.php'); ob_end_flush(); ?>
