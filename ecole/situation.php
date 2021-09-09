<?php include('header.php'); ?>
<body>
<?php
if(isset($_GET['matr']) && isset($_GET['annacad'])){
	$type_reche=$_GET['matr'];
  $annacad=$_GET['annacad'];
   $total1=0;
   $total2=0;
   $total_depnese_cdf=0;
   $total_depnese_usd=0;
	echo '
<table class="table table-stripped table-bordered "  >
        <tr>
        <th style=": 90px;">Motif</th>
        <th style=": 90px;">USD</th>
        <th style=": 90px;">CDF</th>
        <th style=": 90px;">FACTURE</th>
        <th style=": 100px;">Quantité</th>
        <th style=": 100px;">COMPTE</th>
        <th style=";width: 120px;">Date</th><tr>
';
$requete = $bdd->query("SELECT matricule,nom_eleve,qte_acheter,motif,classe_eleve,montantusd,montantcdf,cdfact,date_enreg,compte  FROM finance WHERE matricule='$type_reche' and anne_acad='$annacad' ORDER BY date_enreg ASC  ");
  if($requete->rowCount()== 0){
    echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
  }
  else{
  $requeteid = $bdd->query("SELECT * FROM eleve WHERE   matricule='$type_reche'  ");
  $resultatid = $requeteid->fetch();
  echo '
  <div class="row" >
  <div class="col-lg-2">
     <img class="img-responsive" src="../images/fr.jpg" width="100%" height="100%" title="'.$resultat['prenom'].' '.$resultat['nom'].'" alt="Photo maquante"/>
  </div> 
    <div class="col-lg-6">
  </div> 

<div class="col-lg-4">
    <a href="detail.php?matricule='.$resultatid['matricule'].'" >
    <ul class="list-group">
         <li class="list-group-item">
        <span class="badge">'.$resultatid['nom'].' '.$resultatid['postnom'].'</span>
        Nom et Post Nom
  </li></a>

  <li class="list-group-item">
        <span class="badge"> '.$resultatid['prenom'].'</span>
        Prenom
  </li>

   <li class="list-group-item">
        <span class="badge"> '.$resultatid['promotion'].'</span>
        Classe
  </li>

   </div>
</div>';
      while ($resultat = $requete->fetch()){                           
            echo '  	
                <tr>  
                 <td style="font-size: 11px;"><b>'.$resultat['motif'].'</b></td>
                  <td style="font-size: 11px;">'.$resultat['montantusd'].'</td>
                  <td style="font-size: 11px;">'.$resultat['montantcdf'].' Fc</td>
                  <td style="font-size: 11px;">'.$resultat['cdfact'].' </td>
                  <td style="font-size: 11px;">'.$resultat['qte_acheter'].'</td>
                  <td style="font-size: 11px;">'.$resultat['compte'].'</td>
                  <td style="font-size: 11px;">'.$resultat['date_enreg'].'</td>
                </tr>  ';
                  $total1+=$resultat['montantcdf'];
                  $total2+=$resultat['montantusd'];
                      }//fin while
                                 
                    }  
           echo'       
              </table>';
       echo '
       <p></p> 
       <hr>
       <table class="table table-stripped table-bordered " style="background-color:white;">
         <tr>
       ';
    $selection_mois=$bdd->query("SELECT moisp,etat from mois where matricule='$type_reche'  and annee_acad='$annacad' and etat='dispo' ") ;
        while($resulta_mois=$selection_mois->fetch()){
        echo '<td  class="alert alert-danger">'.$resulta_mois['moisp'].' </td>
       '; }
       echo'</tr>
       </table>  ';
        echo'  
          <ul  class="list-group">
              <li class="list-group-item">
                      <span class="badge"><b>'.$total2.' ($)</b></span>
                      Total en USD
               </li>

                <li class="list-group-item">
                      <span class="badge"><b>'.$total1.' (FC)</b></span>
                      Total en CDF
               </li>
         </ul>                      
  ';
}
?>
<?php include('footer.php');  ?>