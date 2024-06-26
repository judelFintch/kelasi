<?php include('header.php'); ?>
</head>

<body>
	
		<article style="background-image:url(2.jpeg); background-size:100px 100%; border:1px solid grey;">
		

		</div>
		

	
<script type="text/javascript">
   
    function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 	
	}
   
   </script>

   <style type="text/css">
	
	
	}

</style>

 <div id="div1"> 


<?php

$n=1;
    
	$requete = $bdd->query("SELECT * FROM derogation where  annee_academique='$annacad' and date_fin='$date' ")or die(print_r($bdd->errorInfo()));
	if($requete->rowCount()== 0){

		echo '<p style="color:red;" align="center">Nos fillatrage</p>';

	

    echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;">
		<th>N°</th>
		<th>MATRICULE</th>
		<th>NOM</th>
		<th>POSTNOM</th>
		<th>PRENOM</th>
		<th>CLASSE</th>
		<th>ETAT</th>
	
		<th>SITUATION</th>';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?matricule='.$resultat['matricule'].'">'.$resultat['matricule'].'</a></td>
		

		<td>'.$resultat['nom_eleve'].'</td>


		<td>'.$resultat['date_debut'].'</td>



		<td>'.$resultat['date_fin'].'</td>



		<td>'.$resultat['classe'].'</td>
		<td>'.$resultat['etat'].'</td>


	

		<td><a href="situation.php?matr='.$resultat['matr'].'">S. GENERALE </a>||<a href="autre_frais.php?matr='.$resultat['matr'].'"> Autres</a></td></tr>';
	}
	
	echo '</table><br />';

	}
	else{
		echo '<table class="table table-stripped table-bordered table-condensed" id="cont" style="background-color:white;">
		<th>N°</th>
		<th>MATRICULE</th>
		<th>NOM</th>
		<th>Date debut</th>
		<th>Date de Fin</th>
		<th>CLASSE</th>
	
		<th>SITUATION</th>';
		
	while ($resultat = $requete->fetch()){
		echo '<tr><td>'.$n++.'</td>
		<td><a href="detail.php?matricule='.$resultat['matricule'].'">'.$resultat['matricule'].'</a></td>
		

		<td>'.$resultat['nom_eleve'].'</td>


		<td>'.$resultat['date_debut'].'</td>



		<td>'.$resultat['date_fin'].'</td>



		<td>'.$resultat['classe'].'</td>
		<td>'.$resultat['etat'].'</td>


	

		</tr>';
	}
	

	}
	
	
	?>
</div>

	<input id="button" type="button" value="Imprimer"  class="btn btn-success" onclick="printContent('div1')"/>
 
</form>
</table><br />


<style type="text/css">

#button{

 margin-left: 1070px
}


</style>






<?php include('footer.php');  ?>