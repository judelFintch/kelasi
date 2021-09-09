<html>

	<head>
		<meta charset="UTF8" />
		<title>Version Rapport</title>
		<script language="Javascript" src="jquery.js" ></script>		
		<?php include('liens_boostrap.php') ?> 
	</head>

	<?php require_once('../bdd_app_gst_connect/allscirpt.inc.php'); ?>

	<style type="text/css">
		

		td{

			width: 300px;
		}

		.private{
			height: 100%;
			margin-left: 100px;
			margin-right: 100px
		}
	</style>

	 <script type="text/javascript">
   
   function printContent(el){

    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 }
   
   </script>
	
	<body>
	
		<div class=" private">
			<div class="row">
				<div class="page-header">
					<h1>Version Rapport</h1>
				</div>
			</div> 
			<div class="row">

			<input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>

</form>

				<div class="col-md-5">


				<form action="" method="post" id="jn">
        <select name="classe" class="form-control">
         <option value="1">Toutes les classes</option>
         <option value="Pre-M">Pre-Mat(Correct)</option>

        <?php $selection_de_classe=$bdd->query("SELECT nomclasse FROM classe "); ?>
                  <?php while ( $liste_classe=$selection_de_classe->fetch()) {
                    echo '<option value="'.$liste_classe['nomclasse'].'">'.$liste_classe['nomclasse'].'</option>';
                  }
                  ?>
                  
                </select>


                <select name="annee" class="form-control">
         

        <?php $annee=$bdd->query("SELECT annee FROM anne_scolaire "); ?>
                  <?php while ( $info=$annee->fetch()) {
                    echo '<option value="'.$info['annee'].'">'.$info['annee'].'</option>';
                  }
                  ?>
                  
                </select>

                <p></p>
          <input type="submit" value="Afficher" class="btn btn-primary" />
        </form>
      
					

				</div>

				<div class="col-offset-md-1 col-md-5">
					

				</div>
				
			</div>
			<hr />
			<div class="row">

			<div id="div1"> 

				<h3>Rapport Litige Pour  </h3>

				<div class="table-responsive">

				<table class="table table-striped table-bordered ">
					<tr>
                      <td>N</td>
					   <td>Matricule</td>
						<td>Nom Eleve</td>
						<td>Classe</td>
						<td>Septembre</td>
						<td>Octrobre</td>
						<td>Novembre</td>
						<td>Decembre</td>
						<td>Janvier</td>
						<td>Fevier</td>
						<td>Mars</td>
						<td>Avril</td>
						<td>Mai</td>
						<td>Juin</td>
					</tr>

       <?php 

$i=0;

            if(isset($_POST['classe'])){


            	echo '<h4><p class="alert alert-success">'. $_POST['classe'].'  Annnee Scolaire '. $_POST['annee'].'</p></h4>';
             $classe=$_POST['classe'];
             $annee=$_POST['annee'];



            if($classe==1){	
           
            $information=$bdd->query("SELECT * FROM situation_eleve where M_Juin='' and M_Mais='' and anneescolaire='$annee'  order by classe");

            }
            else{

             $information=$bdd->query("SELECT * FROM situation_eleve where M_Juin='' and M_Mais='' and classe='$classe' and anneescolaire='$annee' order by classe");

            }


            while ( $tabdonnees=$information->fetch()) {
            	# code...

            	$i++;
            


				echo '	<tr>
				 <td>'.$i.'</td>

					   <td>'.$tabdonnees['matricule'].'</td>
						<td>'.$tabdonnees['nom_eleve'].'</td>
						<td>'.$tabdonnees['classe'].'</td>
						<td>'.$tabdonnees['M_Sep'].'</td>
						<td>'.$tabdonnees['M_Octobre'].'</td>
						<td>'.$tabdonnees['M_Novembre'].'</td>
						<td>'.$tabdonnees['M_Decembre'].'</td>
						<td>'.$tabdonnees['M_Janvier'].'</td>
						<td>'.$tabdonnees['M_Fevrier'].'</td>
						<td>'.$tabdonnees['Mois_de_Mars'].'</td>
						<td>'.$tabdonnees['M_Avril'].'</td>
						<td>'.$tabdonnees['M_Mais'].'</td>
						<td >'.$tabdonnees['M_Juin'].'</td>
						
					</tr>




		';


}



}
?>
				</table>

			</div>

			</div>
		
		
	</body>


	
</div>
	</div>
	<script language="Javascript" src="traitement.js" ></script>

</html>
