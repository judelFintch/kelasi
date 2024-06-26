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

</head>
<body>
 
<body>


<div class="row">

<div class="col-md-10">



      
<form class="form-inline" action="selons.php" method="post">
      <div class="form-group">
           <label for="exampleInputName2">SELON ELEVE :</label>
                 <input type='date' name='du' class="form-control"  value="<?php echo date('Y-m-d')?>">
                 <input type='date' name='au' class="form-control"  placeholder='date' value="<?php echo date('Y-m-d')?>">
                  <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>
                 <button type="submit" class="btn btn-info">Afficher</button>
      </div>
       
</form>

</div>

<div class="col-md-2">
<input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>

</div>

<div id="div1">
<div id="conteneur_principal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- debut conteneur principal -->
<?php
if(isset($_POST['du'])){
$dateD=$_POST['du'];
$dateF=$_POST['au'];
//$annacad=$_POST['annacad'];
   $total1=0;
   $total2=0;
    $total_depnese_cdf=0;
    $total_depnese_usd=0;

?>


<div class="page-header">
<h3><?php  echo $entete=$info_entete['Entete'];?></h3>
Telephone:<?php echo $info_entete['siteweb']?><br>
WebSite:<?php echo $info_entete['siteweb']?><br>

<?php echo $info_entete['adresse']?><br>

  
</div>

<div class="panel panel-default">
  <div class="panel-body">
  <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?php echo $user?> </a></p>
  <h4> <b> <center>SUIVI ELEVES<?php  echo $dateD.' Au '.$dateF.' || ' .$annacad ?>  </center></b> </h4> 
  </div>
</div>


<?php 

        //si la date
     if($dateD <= $dateF){
      $nbT = 0;
      $a = 0;

      
        //selection de la table Licencetb
          
     $requete = $bdd->query("SELECT DISTINCT matricule FROM finance WHERE date_enreg  BETWEEN  '".$dateD."' and '".$dateF."'    ");
                if($requete->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
                 else{
                   while ($resultat = $requete->fetch()){
                  $matr=$resultat['matricule'];
                  $selection_nom=$bdd->query("SELECT nom,postnom,promotion from eleve where matricule='$matr' ");
                   while ($nom_resultat=$selection_nom->fetch()) {
                      echo'<b> '.$nom=$nom_resultat['nom'].' '.$nom_resultat['postnom'].'</b>('.$nom_resultat['promotion'].') <br>';
                    } 
                     
                    
                    
                      $matr;
                      $resultat_affichage=$bdd->query("SELECT motif,montantcdf,montantusd FROM finance where matricule='$matr' and date_enreg  BETWEEN  '".$dateD."' and '".$dateF."'    ")or die(print_r($bdd->errorInfo()));;
                      while ($information= $resultat_affichage->fetch()){
                       echo'<ul>  <li>'.$information['motif'].' : <b>('.$information['montantcdf'].' CDF) '.$information['montantusd'].'(usd)</b></li></ul>';
                        $total1+=$information['montantcdf'];
                        $total2+=$information['montantusd'].'<br>';
                        
                        # code...
                      }
                      

                   

                    }
                 }

               

                }

                echo "<h5><b> TOTAL CDF  :".$total1.'<b>';
                echo "<b> TOTAL USD:  ".$total2.'<b></h5>';

              }
          

                 ?>
</div>
</body></html>
