<?php
ob_start(); 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Derogation ||<?php echo $entete ?></title>
<?php include('liens_boostrap.php') ?>
<style type="text/css">
#hed,#re{
display:table-cell;
}
#he{
background-color:black;
color:royalblue;}
li{
	list-style-type: none;
}
label{
	display: inline-block;
	width: 20%;
}
#cl input,select{
	width: 30%;
}
</style>
</head>

<body>
	<?php include('header.php'); ?>
		<article style=" background-size:100px 100%; border:1px solid grey;">
			<p align="center"><h4><center>EFFECTUER UNE DEROGATION</center></h4></p>
		
		<div style="margin-left:20%;" id="cl">
			<form action="" method="post" enctype="multipart/form-data">
			<?php  $selection_compte_depense=$bdd->query("SELECT nom,matricule 
			                                               FROM frais_insciption where annacad='$annacad'");?>


                <label for="code">Nom:</label>
                <select  name="nomeleve">
                <?php  while($resulta_compte=$selection_compte_depense->fetch()){
                 echo '<option value='.$resulta_compte['matricul'].'> '.$resulta_compte['nom'].'</option>' ;
                  } ?>
                </select><br /> 
				
				<label for="datedebut">Date Debut: </label><input type="date" value="<?php echo date('Y-m-d') ?>" name="datedebut" value="" required /><br />
				<label for="datefin">Date Fin: </label><input type="date" name="datefin" value="" required /><br />
				<br />
				<label for="code">Mois:</label>
				<select name="mois">
					
					<option value="Septembre">Septembre</option>
					<option value="Octobre">Octobre</option>
					<option value="Novembre">Novembre</option>
					<option value="Decembre">Decembre</option>
					<option value="Janvier">Janvier</option>
					<option value="Frevier">Frevier</option>
					<option value="Mars">Mars</option>
					<option value="Avril">Avril</option>
					<option value="Mais">Mai</option>
					<option value="Juin">Juin</option>

				</select><br />

				
				
				<label></label><input type="submit"  class="btn btn-success" /><br /><br /> 

			</form>
		</div>

		
		</article>
		</div>
		
		
</body>
</html><br />


<?php
	
		if (isset($_POST['nomeleve'])) {
			
			
            
				$matricule=htmlentities($_POST['nomeleve']);
				$datedebut= htmlentities($_POST['datedebut']);
				$datefin=htmlentities($_POST['datefin']);
				$mois=htmlentities($_POST['mois']);

				EffectuerUneDerogationEleve($matricule,$datedebut,$datefin,$mois);

			


			   
				
			}
			
	include("recherche.php");


?>
<?php include('footer.php');  ob_flush();?>
