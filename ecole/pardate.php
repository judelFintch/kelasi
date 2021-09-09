<?php include('header.php'); ?>
<body>
<meta charset="utf-8">  
<?php
if(isset($_POST['du'])){
$dateD=$_POST['du'];
$dateF=$_POST['au'];
//$annacads=$_POST['annacad'];
   $total1=0;
   $total2=0;
   $total_depnese_cdf=0;
   $total_depnese_usd=0;
 }
 else{
  exit();
 }
?>
<div class="row">
<div class="col-md-10">
<form class="form-inline" action="pardate.php" method="post" >
      <div class="form-group">
           <label for="exampleInputName2">RAPPORT GENERAL :</label>
                <input type='date' class="form-control"  name='du' value="<?php echo date('Y-m-d')?>">
                <input type='date' class="form-control"  name='au' placeholder='date' value="<?php echo date('Y-m-d')?>" >
                 <select name = "annacad" class="form-control">
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>
        <button type="submit"   class="btn btn-info">Afficher</button>
    </div>
</form>
</div>
 <div class="col-md-2">
    <input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>
   </div>
</div>
<div id="div1">
   <div class="page-header">
      <b><?php  echo $entete=$info_entete['Entete'];?></b><br>
      <b><?php  echo $entete=$info_entete['Sloga'];?></b><br>
      Telephone:<?php echo $info_entete['telephone']?><br>
          <?php echo $info_entete['siteweb']?><br>
          <?php echo $info_entete['adresse']?><br>
</div>
<h4> <b> <center>RAPPORT ENTREE ET SORTIE DU  <?php  echo $dateD.' Au '.$dateF.' ' ?>  </center></b> </h4> 
<table class="table table-striped ">
        <tr>
        <tr>
<?php
   $totusd;
   $totcdf;
   $total1d=0;
   $total2d=0;
 $requete=$bdd->query("SELECT DISTINCT compte FROM finance WHERE  (date_enreg BETWEEN '".$dateD."' and '".$dateF."') ")or die(print_r($bdd->errorInfo()));
     while ($resultat_d = $requete->fetch()){
         $compte=$resultat_d['compte'];
             $selection_libelle=$bdd->query("SELECT libelle from jeux_de_compte WHERE numero_compte='$compte'");
               while($libelle_compte=$selection_libelle->fetch()){
                  echo '<th>'.$libelle_compte['libelle'].'<th>';
                  }
                  //recuperation de la somme par compte en usd 
                  $usd=$bdd->query("SELECT SUM(montantusd),SUM(montantusd) FROM finance WHERE date_enreg BETWEEN '".$dateD."' and '".$dateF."'  AND compte='$compte'");
                  $usd=$usd->fetchColumn();
                  //recuperation de la somme par compte en cdf
                   $cdf=$bdd->query("SELECT SUM(montantcdf) FROM finance WHERE date_enreg BETWEEN '".$dateD."' and '".$dateF."'  AND compte='$compte'");
                  $cdf=$cdf->fetchColumn();
                  $selectioniformation=$bdd->query("SELECT matricule,
                                                      nom_eleve,
                                                      motif,
                                                      classe_eleve,
                                                      montantusd,
                                                      montantcdf,
                                                      type,
                                                      cdfact,
                                                      compte,qte_acheter,
                                                      date_enreg,anne_acad,pour_annee
                                                FROM finance  WHERE date_enreg BETWEEN '".$dateD."' and '".$dateF."'  AND compte='$compte'");
                       while($resultat=$selectioniformation->fetch()){
                         if($resultat['anne_acad']==$resultat['pour_annee']){
                          $mention='----';
                         }
                         else{
                          $mention='Litige '.$resultat['pour_annee'];
                         }                                              
                       echo '	
                          <tr>  
                             <td>'.$resultat['matricule'].'</td>
                             <td>'.$resultat['nom_eleve'].'</td>
                             <td>'.$resultat['motif'].'</td>
                             <td>'.$resultat['classe_eleve'].'</td>
                             <td>'.numeberormat($resultat['montantusd']).'</td>
                             <td >'.numeberormat($resultat['montantcdf']).' Fc</td>
                              <td >'.$resultat['qte_acheter'].'</td>
                             <td>'.$resultat['type'].' </td>
                             <td>'.$resultat['cdfact'].'</td>
                             <td >'.$resultat['date_enreg'].'</td>
                             <td >'.$mention.'</td>

                            
                         </tr> 	
                      ';  
                     $total1+=$resultat['montantcdf'];
                     $total2+=$resultat['montantusd'];
                     }//fin while 
                     echo '<tr><td>Sous Total :</td><td><b>'.$usd.' USD</b><td> <td><b>'.$cdf.' CDF</b><td></tr>';


             
             }

                
            //$solde_usd=$total2-$total_depnese_usd;
            //$solde_fc=$total1-$total_depnese_cdf;
           
?>
</table> 

<div class="well">
   <ul class="group-list">
   <label>Total Production USD </label>
     <li class="group-list"><?php echo numeberormat($total2); ?> USD</il>
      <li class="group-list"><?php echo numeberormat($total1); ?> CDF</il>
     
   </ul>
  

</div>


<hr>
<h3>Sorties </h3>
<table class="table table-striped ">
        <tr>
        <tr>
<?php
   $totusd;
   $totcdf;
 $requete=$bdd->query("SELECT DISTINCT numero_compte_S FROM depense WHERE  (date_s BETWEEN '".$dateD."' and '".$dateF."') ")or die(print_r($bdd->errorInfo()));
     while ($resultat_d = $requete->fetch()){
         $compte=$resultat_d['numero_compte_S'];
             $selection_libelle=$bdd->query("SELECT libelle from jeux_de_compte WHERE numero_compte='$compte'");
               while($libelle_compte=$selection_libelle->fetch()){
                  echo '<th>'.$libelle_compte['libelle'].'<th>';
                  }
                  //recuperation de la somme par compte en usd 
                  $usd=$bdd->query("SELECT SUM(montantusd_s) FROM depense WHERE date_S BETWEEN '".$dateD."' and '".$dateF."'  AND numero_compte_s='$compte'");
                  $usd=$usd->fetchColumn();
                  //recuperation de la somme par compte en cdf
                   $cdf=$bdd->query("SELECT SUM(montantcdf_s) FROM depense WHERE date_s BETWEEN '".$dateD."' and '".$dateF."'  AND numero_compte_s='$compte'");
                  $cdf=$cdf->fetchColumn();
                  $selectioniformation=$bdd->query("SELECT *
                                                FROM depense  WHERE date_s BETWEEN '".$dateD."' and '".$dateF."'  AND numero_compte_s='$compte'");
                       while($resultat=$selectioniformation->fetch()){                                              
                       echo ' 
                          <tr> 
                             <td >Compte: '.$resultat['compte_s'].'</td> 
                             <td> code: '.$resultat['code_sortie_s'].'</td>
                             <td> Motif: '.$resultat['motif_s'].'</td>
                             <td> USD'.numeberormat($resultat['montantusd_s']).'</td>
                             <td>  CDF'.numeberormat($resultat['montantcdf_s']).'</td>
                            
                             
                             
                             <td>Beneficaire:'.$resultat['nom_recepteur_s'].' </td>
                             <td>Autoriser: '.$resultat['effectuer_par_s'].'</td>
                              <td >'.$resultat['date_s'].'</td>
                              
                         </tr>  
                      ';  
                     $total1d+=$resultat['montantcdf_s'];
                     $total2d+=$resultat['montantusd_s'];
                     }//fin while 
                     echo '<tr><td>Sous Total :</td><td><b>'.$usd.' USD</b><td> <td><b>'.$cdf.' CDF</b><td></tr>';


             
             }

                
            //$solde_usd=$total2-$total_depnese_usd;
            //$solde_fc=$total1-$total_depnese_cdf;
           
?>

    </table> 

    <div class="well">
   <ul class="group-list">
   <label>Total Sorties   </label>
     <li class="group-list"><?php echo $total2d; ?> USD</il>
      <li class="group-list"><?php echo $total1d; ?> CDF</il>
     
   </ul>
  

</div>


  </table> 

    <div class="well">
   <ul class="group-list">
   <label>Solde Generals </label>
     <li class="group-list"><?php echo "$total2  USD  - $total2d "?>USD = <b><?php echo numeberormat($total2-$total2d);?> USD</il></b>
      <li class="group-list"><?php echo "$total1 CDF  - $total1d"?> CDF =  <b><?php echo $total1-$total1d ?> CDF</b></il>
     
   </ul>
  

</div>
             
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