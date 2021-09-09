<body>
	<?php include('header.php');?>

	 <!--formulaire enregistrement frais hors systeme -->
	 <?php 

	 function affichageStockArticle(){
	 	global $bdd;

	 	$article=$bdd->query("SELECT * FROM articles where type=1") or die(print_r($bdd->errorinfo()));
	 	$tabArticle=$article->fetchAll();
	 	return $tabArticle;


	 }


	 ?>

	  <div class="row">
	  	 <div class="col-lg-10">
	  	<table class="table table-striped table-bordere">
	  		<thead>
	  			<tr>
	  				<td>N</td>
	  				<td>Id</td>
	  				<td>Libelle</td>
	  				<td>Qte</td>
	  				<td>Prix</td>
	  				<td>Devise</td>
	  				<td>Fiche des Appro</td>

	  			</tr>
	  		</thead>

	  			<tbody>
	  				
	  					<?php
	  					$i=0;
	  					 $tabArticle=affichageStockArticle();
	  					 foreach ($tabArticle as $key ) {
	  					 	$i++;
	  					 	# code...
	  					 	echo '
	  					 	<tr>
	  					 	<td>'.$i.'</td>
	  					 	<td>'.$key['id'].'</td>
	  					 	<td>'.$key['nom_article'].'</td>
	  					 	<td>'.$key['qte'].'</td>
	  					 	<td>'.$key['prix'].'</td>
	  					 	<td>'.$key['devise'].'</td>
	  					 	<td><a href="details_article.php?idArt='.$key['qte'].'">Details</a></td>
	  					 	</tr>';
	  					 }
	  					  
	  					?>
	  					
	  				
	  			</tbody>
	  			<tfooter></tfooter>

	  		
	  	</table>

	  </div>
	  	
	  </div>



	  <!--Fin formulaire enregistrement frais hors systeme -->





 
 <?php  include('footer.php');?>
<script type="text/javascript" src="js/__autres_entree.js"></script>


