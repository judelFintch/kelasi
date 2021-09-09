<?php include('header.php'); ?>
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
		     	<input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>
				<div class="col-md-10">
    	<form action="" method="post" class="form-inline" id="jn" name="form-one">
       <label>Liste des eleves insolvables Pour  :</label>
        <select name="classe"  class="form-control">
         <option value="1">Toutes les classes</option>
         <option value="Pre-M">Pre-Mat(Correct)</option>
        <?php $selection_de_classe=$bdd->query("SELECT nomclasse FROM classe order by nomclasse "); ?>
                  <?php while ( $liste_classe=$selection_de_classe->fetch()) {
                    echo '<option value="'.$liste_classe['nomclasse'].'">'.$liste_classe['nomclasse'].'</option>';
          }
        ?>       
        </select>
        <label>Appartir du Mois de   :</label>
           <select name="mois" class="form-control">
            <?php $annee=$bdd->query("SELECT DISTINCT moisp FROM mois "); ?>
                <?php while ( $info=$annee->fetch()) {
                   echo '<option value="'.$info['moisp'].'">'.$info['moisp'].'</option>';
                  }
                  ?>              
                </select>
                <select name="annee" class="form-control">
                <?php $annee=$bdd->query("SELECT annee FROM anne_scolaire order by id desc "); ?>
                  <?php while ( $info=$annee->fetch()) {
                    echo '<option value="'.$info['annee'].'">'.$info['annee'].'</option>';
                  }
                  ?>
                </select>
                <input type="hidden" name="type" value="insolvable">
             <input type="submit" value="Afficher" name="btn-one" class="btn btn-primary" />
        </form>
				</div>
				<div class="col-offset-md-1 col-md-2">
		</div>
			</div>
			<hr />
			<div class="row">
			<div id="div1"> 
					<div class="table-responsive">
				  <table class=" table table-striped table-bordere " >
          <thead>
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
						<td>Fevrier</td>
						<td>Mars</td>
						<td>Avril</td>
						<td>Mai</td>
						<td>Juin</td>
					</tr>
          <thead>
<?php 
$i=0;
 if(isset($_POST['type'])){
 	if($_POST['type']=='insolvable'){
     if($_POST['classe']==1){
        $mention="Toutes les Classes";
      }
    else{
      $mention=$_POST['classe'];
    }
  echo '<h4><p class="alert alert-info"> Resultat litige   '.$_POST['mois'].' , <b>'. $mention.'</b> ,  '. $_POST['annee'].'</p></h4>';
             echo $classe=$_POST['classe'];
             $annee=$_POST['annee'];
             $mois=$_POST['mois'];
             //$dynamiqueTables=dynamiqueTables($annee);
             $annee='2015-2016';
          if($classe==1){
            switch ($mois) {
                   		   case 'Septembre':
                   			# code...
          $information=$bdd->query("SELECT  * FROM bsituation where anneescolaire='$annee' and   M_Sep=''  order by classe") or die(print_r($bdd->errorInfo()));
                   			break;
                   			case 'Octobre':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Octobre=''  order by classe");
                   			break;
                   			case 'Novembre':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Novembre=''  order by classe");
                   			break;
                   			case 'Decembre':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Decembre=''  order by classe");
                   			break;
                   			case 'Janvier':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Janvier=''  order by classe");
                   			break;
                   			case 'Fevrier':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Fevrier=''  order by classe");
                   			break;
                   			case 'Mars':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and Mois_de_Mars=''  order by classe");
                   			break;
                   			case 'Avril':
                   			# code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Avril=''  order by classe");
                   			break;
                   			case 'Mai':
                   			# code...
         $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Mais=''  order by classe");
                   			break;
                   			case 'Juin':
                   			# code...
        $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' and M_Juin=''  order by classe");
                   			                   		
                   		default:
                   			# code...
                   			break;
                   	}

                   }

  if($classe<>1){
            switch ($mois) {
                         case 'Septembre':
                        # code...
          $information=$bdd->query("SELECT  * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and   M_Sep=''  order by classe") or die(print_r($bdd->errorInfo()));
                        break;
                        case 'Octobre':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Octobre=''  order by classe");
                        break;
                        case 'Novembre':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Novembre=''  order by classe");
                        break;
                        case 'Decembre':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Decembre=''  order by classe");
                        break;
                        case 'Janvier':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Janvier=''  order by classe");
                        break;
                        case 'Fevrier':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Fevrier=''  order by classe");
                        break;
                        case 'Mars':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and Mois_de_Mars=''  order by classe");
                        break;
                        case 'Avril':
                        # code...
          $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Avril=''  order by classe");
                        break;
                        case 'Mai':
                        # code...
         $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Mais=''  order by classe");
                        break;
                        case 'Juin':
                        # code...
        $information=$bdd->query("SELECT * FROM bsituation where anneescolaire='$annee' AND classe='$classe'and M_Juin=''  order by classe");
                                              
                      default:
                        # code...
                        break;
                    }
           while ( $tabdonnees=$information->fetch()) {
            $i++;
        echo '  <tr>
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

   
  }
}


?>
</table>
	<script language="Javascript" src="traitement.js" ></script>
   <?php  include('footer.php');?>

