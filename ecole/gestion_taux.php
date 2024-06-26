<?php 
ob_start();
include('header.php'); ?>
</head>
<body>		
	<div class="row">

	   <div class="col-lg-6">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="code">TAUX DU JOUR</label>
				<input class="form-control"  type="text" class="form-control" name="taux" value="" required /><br />
				</hr>
				<label></label><input type="submit" value="REGLER" class="btn btn-success" /><br /><br /> 
			</form>

			</div>
</div>
<?php
	if (isset($_POST['taux'])) {
			$date=date('Y-m-d');
			$taux= $_POST['taux'];
			$bdd->exec("INSERT INTO taux VALUES('','$taux','$date')");
			    header("location:gestion_taux.php");
				echo '<p style="color:green;" align="center">Fait correctement!</p>';
			}
			
	include("recherche.php");
?>
<?php include('footer.php'); ob_end_flush();  ?>