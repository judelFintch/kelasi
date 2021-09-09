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
      <h3><?php  echo $entete=$info_entete['Entete'];?></h3>
      <p><?php  echo $entete=$info_entete['Sloga'];?></p>
      Telephone:<?php echo $info_entete['telephone']?><br>
      WebSite:<?php echo $info_entete['siteweb']?><br>
      <?php echo $info_entete['adresse']?><br>
</div>
<h4> <b> <center>RAPPORT ENTREE ET SORTIE DU  <?php  echo $dateD.' Au '.$dateF.' ' ?>  </center></b> </h4> 
<table class="table table-striped ">
        <tr>
        <th>MATRICULE</th>
        <th >NOM</th>
        <th>MOTIF</th>
        <th >CLASSE</th>
        <th>M. USD </th>
        <th>M. CDF </th>
        <th >TYPE</th>
        <th >FAC</th>
        <th >COMPTE</th>
        <th >DATE</th><tr>
<?php

   $requette=$bdd->query('
select jeux_de_compte.libelle AS libelle, finance.compte as compte, ( sum(finance.montantusd) - sum(depense.montantusd_s) ) as difference 
from finance, depense, jeux_de_compte 
where finance.compte=depense.numero_compte_s 
  and finance.compte = jeux_de_compte.numero_compte
group by finance.compte') or die(print_r($bdd->errorInfo()));
   while ($requette->$requette->fetch()) {
     # code...
   }

 $code_compte=$bdd->query("SELECT DISTINCT compte FROM finance WHERE date_enreg BETWEEN '".$dateD."' AND '".$dateF."' AND anne_acad='$annacad' AND type<>101");
      while ($code_compte=$code_compte->fetch()) {
        # code...
      }
 $requete = $bdd->query("SELECT matricule,nom_eleve,motif,classe_eleve,montantusd,montantcdf,cdfact,date_enreg,type,compte  FROM finance WHERE date_enreg BETWEEN '".$dateD."' AND  '".$dateF."' and anne_acad='$annacad' AND type<>101 ");
                if($requete->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
                 else{
                   while ($resultat = $requete->fetch()){
                                           
                 echo'	
                      <tr>  
                         <td>'.$resultat['matricule'].'</td>
                         <td>'.$resultat['nom_eleve'].'</td>
                         <td>'.$resultat['motif'].'</td>
                         <td>'.$resultat['classe_eleve'].'</td>
                         <td>'.$resultat['montantusd'].'</td>
                         <td >'.$resultat['montantcdf'].' Fc</td>
                         <td>'.$resultat['type'].' </td>
                         <td>'.$resultat['cdfact'].'</td>
                         <td>'.$resultat['compte'].'</td>
                         <td >'.$resultat['date_enreg'].'</td>
                     </tr> 	';
                      $total1+=$resultat['montantcdf'];
                      $total2+=$resultat['montantusd'];
                      }//fin while

          echo  ' </table>
          <hr>
          <table class="table table-striped ">';
             $requete_dp = $bdd->query("SELECT * FROM depense WHERE  date BETWEEN '".$dateD."' and '".$dateF."'  ")or die(print_r($bdd->errorInfo()));
             if($requete_dp->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
             else{ 
                 while ($depense=$requete_dp->fetch()) {
                 $motif=$depense['motif'];
                 $total_depnese_cdf+=$depense['montantcdf'];
                 $total_depnese_usd+=$depense['montantusd'];
                 echo '
                 <td>  SORTIE</td>
                 <td>  '.strtoupper($depense['compte']).'</td>
                 <td> '.strtoupper($depense['motif']).'</td>
                 <td>  Benéficiaire '.strtoupper($depense['nom_recepteur']).' </td>
                   <td>  '.$depense['montantcdf'].' CDF</td>
                   <td> '.$depense['montantusd'].' USD</td>
                    <td> Par  '.$depense['effectuer_par'].' </td>
                     <td> N Compte '.$depense['numero_compte'].' </td>
                    <td> Date '.$depense['date'].' </td>
                 
                 </tr>';

                  }


                    
  
     }
    
      

      
    }

                    $solde_usd=$total2-$total_depnese_usd;
                    $solde_fc=$total1-$total_depnese_cdf;



                     echo'
                        
                        <td style="background: #f2dede;font-size: 11px;">
                        <b>Total</b></td>
                        <td style="background: #f2dede;font-size: 11px;">Total depense USD '.$total_depnese_usd.'</td>
                        <td style="background: #f2dede;font-size: 11px;">Total depense CDF '.$total_depnese_cdf.'<b>
                        </b></td>
                        <td style="background: #f2dede;font-size: 11px;"><b></b></td>
                        <td style="background: #f2dede;font-size: 11px;"><b>'.$total2.' (USD)</b></td>
                        <td style="background: #f2dede;font-size: 11px;"><b>'.$total1.' (CDF)</b></td>
                        <td style="background: #f2dede;font-size: 11px;">S. $ '.$solde_usd.'</td>
                        <td style="color:red;font-size: 17px;background: #f2dede;font-weight: bold;font-size: 11px;""><b> S. FC'.$solde_fc.'</b></td></tr>
        </table>';?>

         

        <div id="total">
        <p><b>Rapport ENTREE ET SORTIE du <?php echo $dateD.' Au '.$dateF  ?></b></p>

       <p> <span class="element">TOTAL SORTIE EN CDF :<?php  echo $total_depnese_cdf?> </span>
        ||<span class="element">Total SORTIE USD est de :<?php  echo $total_depnese_usd?></span><br></p>

       <p> <span class="element" >ENTREE  CDF est de :<?php  echo $total1?></span>
        ||<span class="element"> ENTREE  USD est de :<?php  echo $total2?></span></p>
          

          <p> <span class="element"> SOLDE EN CDF :<?php  echo $solde_fc?></span>
         ||<span class="element"> SOLDE EN USD :<?php  echo $solde_usd?></span></p>
        </div>
<?php  }?>
</div>
</body></html>
   <script type="text/javascript">
   
   function printContent(el){

    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 }
   
   </script>