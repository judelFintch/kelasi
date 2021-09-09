<?php include('header.php'); ?>

<style type="text/css">
        /*#total{ font-size: 13px; font-weight: 5px; 

        }
        span{ height: 150px; width: 150px; border: solid;

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
<div class="row">
  <div class="col-md-10">
    


    <form method="POST" action="liste_deux.php" class="form-inline">
      <label>MENSUEL 1: </label>
           <select name = "mois" class="form-control">
            <?php
                  $r=$bdd->query("SELECT distinct mois FROM  minerval order by id asc ");
                  while($user=$r->fetch())
                  echo'<option>'.$user['mois'].'</option>';
              ?>
           </select>

            Classe :
                   <select name = "classe" class="form-control">
                    <option value='1'>Toutes les classes</option>
                     <?php
                      $r=$bdd->query("SELECT distinct classe FROM  minerval ");
                      while($user=$r->fetch())
                      echo'<option>'.$user['classe'].'</option>';
                    ?>
                   </select>


                    <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>

                <input type="submit" value="Afficher" class="btn btn-info"></td>

</form>
  </div>
  <div class="col-md-2"><input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/></div>
</div>

<hr>

<?php
if(isset($_POST['mois'])){
         $mois=$_POST['mois'];
         $classe=$_POST['classe'];
		 if($classe==1){$mention="Toutes les classes";}
		 else{$mention=$classe;
		 }
?>

<div id="div1">  

<div class="page-header">
<h3><?php  echo $entete=$info_entete['Entete'];?></h3>
Telephone:<?php echo $info_entete['siteweb']?><br>
WebSite:<?php echo $info_entete['siteweb']?><br>

<?php echo $info_entete['adresse']?><br>

  
</div>     
        


<?php echo 'LISTE DES ELEVES  EN ORDRE POUR LE MOIS  '.$mois.' CLASSE '.$mention.'';  ?>  </h5>
<table class="table table-striped table-bordered" >
        <tr>
        <th>MATRICULE</th>
        <th>NOM</th>
        <th>Mois</th>
        <th>Montant USD</th>

        <th>Montant cdf</th>
        <th>CLASSE</th>

       
        <th >CODE FACTURE</th>
        <th>Type</th><tr>

<?php 
$totalusd=0;
$totalcdf=0;

$c=0;
$d=0;

        //selection de la table Licencetb
          if($classe==1){
		  $requete = $bdd->query("SELECT * FROM finance WHERE motif='$mois' and anne_acad='$annacad' and pour_annee='$annacad' order by  classe_eleve,nom_eleve ASC ") or die($bdd->erroinfo());
		   }
		  else{
             $requete = $bdd->query("SELECT * FROM finance WHERE motif='$mois' and classe_eleve='$classe' and anne_acad='$annacad' and pour_annee='$annacad' order by nom_eleve ASC") ;
			 }
                if($requete->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
                 else{
                   while ($resultat = $requete->fetch()){
                    if($resultat['type']==101){
                      $mention='------------------ ';

                      $c++;



                    }
                    else{
                      $mention="Frais d'appoint";
                      $d++;


                    }
                                   
                  echo '	
                          <tr>  
                         <td >'.$resultat['matricule'].'</td>
                         <td >'.$resultat['nom_eleve'].'</td>
                         <td >'.$resultat['motif'].'</td>

                         <td >'.$resultat['montantusd'].'</td>

                         <td >'.$resultat['montantcdf'].' Fc</td>

                         <td >'.$resultat['classe_eleve'].'</td>
                           <td >'.$resultat['cdfact'].'</td>
                           <td >'.$mention.'</td>
                        
                         </tr> 	';
                         $totalusd+=$resultat['montantusd'];
                         $totalcdf+=$resultat['montantcdf'];

                  
                      }//fin while

                    }//

            

                    
  
     
    
      

      }

     
     
    ?>

                    
</table>
        

        <div id="total">

        <span>Le Total ens USD est de :<?php  echo $totalusd?> </span> ||  <span>Le Total  CDF est de :<?php  echo $totalcdf?>FC</span>
          
        </div>

</div>
</body></html>
