<?php 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:../index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $entete ?></title>
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
		<article style="background-image:url(2.jpeg); background-size:100px 100%; border:1px solid grey;">
			<p align="center"><h4><center>Modifcation En tete</center></h4></p>
		
		<div style="margin-left:20%;" id="cl">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="code">Nom de l'ecole</label><textarea   name="entete"><?php  echo $entete;?></textarea><br />
				<label for="code">Devise</label><textarea name="slogan"></textarea><br />
				<label for="code">Site Web</label><textarea name="site"></textarea><br /> 
				<label for="code">Adresse </label><textarea name="addresse"></textarea><br /> 
				<label for="code">Telephone</label><textarea name="tel"></textarea><br /> 
				<label for="code">Adresse Mail</label><textarea name="mail"></textarea><br />  
				<label></label><input type="submit" value="REGLER" class="btn btn-success" /><br /><br /> 

			</form>
		</div>

		
		</article>
		</div>
		
		
<?php

                if (isset($_POST['entete'])) {
                        $date=date('Y-m-d');
                                $entete=htmlentities($_POST['entete']);
                                $slogan=(htmlentities($_POST['slogan']);
                                $site=htmlentities($_POST['site']);
                                $addresse=htmlentities($_POST['addresse']);
                                $tel=htmlentities($_POST['tel']);
                                $mail=htmlentities($_POST['mail']);
                            $bdd->exec("INSERT INTO info_application  VALUES('','$site','$tel','$addresse','$mail','$entete','$slogan')")or die(print_r($bdd->errorInfo()));
                                echo '<p style="color:green;" align="center">Fait correctement!</p>';

                        }

include("recherche.php");

?>
<?php include('footer.php');  ?>
</body>
</html>
