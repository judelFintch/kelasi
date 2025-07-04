<?php include('header.php'); ?>
<body>
     <script type="text/javascript">
   
   function printContent(el){

    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 }
   
   </script>
    <div class=" private">



<?php
if(isset($_POST['type']) and isset($_POST['classe'])){
$type_reche=$_POST['type'];
 $total1=0;;
 $total2=0;

 
?>
<p>
<div class="row">
 <div class="col-md-10">
<form method="POST" action="par_type.php" class="form-inline">
      <label>PAR TYPE:</label>
           <select name = "type" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct motif FROM  finance where type<>'Frais fonctionnement' and type<>101 and type<>'Appoint Litige' and type<>'Frais Appoint' and anne_acad='$annacad'");
                 while($user=$r->fetch())
                 echo'<option value="'.$user['motif'].'">'.$user['motif'].'</option>';
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

</div>

<div class="col-md-2">
  
  <input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>
</div>
</div>

</p>
  <div id="div1"> 

  <div class="page-header">
<h3><?php  echo $entete=$info_entete['Entete'];?></h3>
Telephone:<?php echo $info_entete['siteweb']?><br>
WebSite:<?php echo $info_entete['siteweb']?><br>

<?php echo $info_entete['adresse']?><br>

  
</div>             

<h4 style="color:white; text-align: center;">
 LISTES DES ELEVES	</h4>



<table class="table table-striped table-bordered  ">
        <tr>
        <th>N</th>
          <th>MATRICULE</th>
        <th>NOM</th>
       
        <th>CLASSE</th>
         <th>LIBELLE</th>
         <th>M. USD</th>
          <th>M. CDF</th>
       
        <th>Date</th><tr>
<?php 
$n=0;
$usd=0;
$cdf=0;
echo $annacad;
if($_POST['classe']==1){

echo $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$requete = $bdd->query("SELECT * FROM `finance` WHERE `motif` LIKE '%$type%' and anne_acad='$annacad' and pour_annee='$annacad' ORDER BY `id` DESC  ") or die(print_r($bdd->errorinfo()));
 }
 else{

echo $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$classe=$_POST['classe'];
$requete = $bdd->query("SELECT * FROM finance WHERE  anne_acad='$annacad' and classe_eleve in('$classe') and motif in('$type') and pour_annee='$annacad   ORDER BY nom_eleve ASC ")or die(print_r($bdd->errorinfo()));
 }

  if($requete->rowCount()== 0){
    echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
  }
  else{
        //selection de la table Licencetb
          
             while ($resultat = $requete->fetch()){
              $n++;

         

                     
                                   
                  echo '	
                          <tr>  
                            <td>'.$n.'</td>
                         <td>'.$resultat['matricule'].'</td>
                         <td>'.$resultat['nom_eleve'].'</td>
                         
                         <td>'.$resultat['classe_eleve'].'</td>
                         <td>'.$resultat['type'].'</td>
                         <td>'.$resultat['montantusd'].'</td>
                         <td>'.$resultat['montantcdf'].'</td>
                         
                         <td>'.$resultat['date_enreg'].'</td>
                         </tr> 	';

                         $usd+=$resultat['montantusd'];
                         $cdf+=$resultat['montantcdf'];

                      
                      }//fin while

                    }//
                                
  
     }
      echo'
        <td style="color:red;font-size: 17px;background: #f2dede;font-weight: bold;font-size: 12px;"">USD<b>'.$usd.' / CDF'.$cdf.' </b></td></tr>
        </table>';?>

<?php  include('footer.php');
