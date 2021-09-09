<?php 
  session_start();
   if(isset($_SESSION['user'])){
   require_once('../bdd_app_gst_connect/allscirpt.inc.php');
   require_once('liens_rapport.php');
          //$rech = $_GET['class'];
     }
   else{
   header("Location:index.php");}
?>
<div class="container" >
<div class="page-header">
	<h2>College Salem</h2>
	<h3>Version Rapport</h3>
</div>
<form class="form-inline" action="" method="post" >
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
<p></p>
<form class="form-inline" action="" method="post">
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

</p>


<p>
<form method="POST" action="" class="form-inline">
      <label>PAR TYPE:</label>
           <select name = "type" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct type FROM  finance where type<>101");
                 while($user=$r->fetch())
                 echo'<option>'.$user['type'].'</option>';
             ?>
          </select>

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

       <input type="submit" class="btn btn-info" value="Afficher" class="btn btn-info"></td>

</form>

</p>
<p>
<form method="POST" action="" class="form-inline">
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
<p></p>

<form method="POST" action="" class="form-inline">
         <label>MENSUEL 2 </label>
           <select name = "mois" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct mois FROM  minerval order by id asc ");
                while($user=$r->fetch())
               echo'<option>'.$user['mois'].'</option>';
           ?>
           </select>

          Classe :
                 <select name = "classe" class="form-control">
                 <option value='1'>Toutes les classes<Option</>
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
<p></p>

<form method="POST" action="" class="form-inline">
       <label>PAR ELEVE</label>
            <select name="eleve" class="form-control">
            <?php
                $re=$bdd->query("select distinct  nom_eleve,matricule,classe_eleve from finance where anne_acad='$annacad' order by nom_eleve ASC ");
                while($date=$re->fetch()){
                echo'<option value="'.$date['matricule'].'">'.$date['nom_eleve'].'(<b> '.$date['classe_eleve'].'</b>)</option>';
                }
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

<p>

<form method="POST" action="" class="form-inline">
           <label>SORTIES</label>
             <select name="eleve" class="form-control">
                <option value="Toutes les sorties">Toutes les sorties</option>
                <?php
                     $re=$bdd->query("select distinct  compte from depense where compte<>'' ");
                     while($date=$re->fetch()){
                     echo'<option value="'.$date['compte'].'">'.$date['compte'].'</option>';
                 }
               ?>
               </select>

<input type='date' name='du' class="form-control" placeholder='date' value="<?php echo date('Y-m-d')?>" >
<input type='date' name='au' class="form-control" placeholder='date' value="<?php echo date('Y-m-d')?>" >

 <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>

<td><input type="submit" value="Afficher" class="btn btn-info">

</form>
</p>


</article>


<script type="text/javascript">
   
    function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 	
	}
   
   </script>


<input type="button"  class="btn btn-success" value="Imprimer"  onclick="printContent('div1')"/>

<div id="div1"  > 

<




<?php
if(isset($_POST['du'])){
$dateD=$_POST['du'];
$dateF=$_POST['au'];
$annacads=$_POST['annacad'];
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
  <h4> <b> <center>RAPPORT ENTREE ET SORTIE DU  <?php  echo $dateD.' Au '.$dateF.' || ' .$annacad ?>  </center></b> </h4> 
  </div>
</div>



<table class="table table-striped ">
        <tr>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">MATRICULE</th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">NOM</th>
        <th style="background: #f2dede; width:px;" style="font-size: 12px;">MOTIF</th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">CLASSE</th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">M. USD </th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">M. CDF </th>
        <th style="background: #f2dede;width: px;"style="font-size: 12px;" >TYPE</th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">FAC</th>
        <th style="background: #f2dede;width: px;" style="font-size: 12px;">DATE</th><tr>
<?php 
    $TdateD = explode("-",$dateD);
    $TdateF = explode("-",$dateF);
    $timeD = mktime(0,0,0,$TdateD[1],$TdateD[2],$TdateD[0]);
    $timeF = mktime(0,0,0,$TdateF[1],$TdateF[2],$TdateF[0]);
        //si la date
     if($timeD <= $timeF){
      $nbT = 0;
      $a = 0;
          for($i = $timeD;$i<=$timeF;$i=$i+86400)
      {
        //selection de la table Licencetb
          
             $requete = $bdd->query("SELECT matricule,nom_eleve,motif,classe_eleve,montantusd,montantcdf,cdfact,date_enreg,type  FROM finance WHERE date_enreg= '".date("Y-m-d",$i)."' and anne_acad='$annacad' AND type<>101 ");
                if($requete->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
                 else{
                   while ($resultat = $requete->fetch()){
                  /* $intital=substr($resultat['cdfact'], 0,2);
                    if($intital=="FM"){
                      $mention="Frais d'appoint";

                    }
                    else{
                      $mention="Autres";
                    }*/
                                   
                  echo '	
                          <tr>  
                         <td style="font-size: 11px;">'.$resultat['matricule'].'</td>
                         <td style="font-size: 11px;">'.$resultat['nom_eleve'].'</td>
                         <td style="font-size: 11px;">'.$resultat['motif'].'</td>
                         <td style="font-size: 11px;">'.$resultat['classe_eleve'].'</td>
                         <td style="font-size: 11px;">'.$resultat['montantusd'].'</td>
                         <td style="font-size: 11px;">'.$resultat['montantcdf'].' Fc</td>
                         <td style="font-size: 11px;">'.$resultat['type'].' </td>
                         <td style="font-size: 11px;">'.$resultat['cdfact'].'</td>
                         <td style="font-size: 11px;">'.$resultat['date_enreg'].'</td>
                         </tr> 	';

                      $total1+=$resultat['montantcdf'];
                      $total2+=$resultat['montantusd'];
                      }//fin while

                    }//

             $requete_dp = $bdd->query("SELECT * FROM depense WHERE date= '".date("Y-m-d",$i)."' ")or die(print_r($bdd->errorInfo()));
             if($requete_dp->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
             else{ 
                 while ($depense=$requete_dp->fetch()) {
                 $motif=$depense['motif'];
                 $total_depnese_cdf+=$depense['montantcdf'];
                 $total_depnese_usd+=$depense['montantusd'];
                 echo '<td style="font-size: 11px;">SORTIE<td></td>
                 <td style="font-size: 11px;"> Vers  '.$depense['motif'].'  '.$depense['montantusd'].' $ || '.$depense['montantcdf'].' FC</td></tr>';

                  }


                    
  
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

         <style type="text/css">
        #total{ font-size: 13px; font-weight: 5px; 

        }
        span{ height: 150px; width: 150px; border: solid 1px; padding: 5px; font-family: verdana;

        }

        </style>

        <div id="total">
        <p><b>Rapport ENTREE ET SORTIE du <?php echo $dateD.' Au '.$dateF  ?></b></p>

       <p> <span>TOTAL SORTIE EN CDF :<?php  echo $total_depnese_cdf?> </span>
        ||<span>Total SORTIE USD est de :<?php  echo $total_depnese_usd?></span><br></p>

       <p> <span>ENTREE  CDF est de :<?php  echo $total1?></span>
        ||<span> ENTREE  USD est de :<?php  echo $total2?></span></p>
          

          <p> <span>SOLDE EN CDF :<?php  echo $solde_fc?></span>
         ||<span> SOLDE EN USD :<?php  echo $solde_usd?></span></p>
        </div>
<?php  }?>





<div>