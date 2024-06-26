 <?php include('header.php'); ?>
<body>
    <form class="form-inline" method="POST">
       <legend>SITUATION GENERALE ELEVE</legend>
          <input type="text" name="matr" required title="Champ" required="" size="80" placeholder="Nom eleve" id="autocomplete2"  class="form-control" />
           <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>
          
        
        <input type="submit" value="Rechercher" class="btn btn-success" />
    </form>
         
<?php
  
  if(isset($_POST['matr'])){
           $type_reche=$_POST['matr'];
           $anne_acad=$_POST['annacad'];
           $total1=0;
           $total2=0;
           $total_depnese_cdf=0;
           $total_depnese_usd=0;

           $requete = $bdd->query("SELECT nom,classe,matricule
                              FROM frais_insciption WHERE nom in('$type_reche') or matricule in('$type_reche')" );
          if($requete->rowCount()==0){
          }

       else{

             $matricule=$requete->fetch();
             $matricule=$matricule['matricule'];

 $requete = $bdd->query("SELECT matricule,nom_eleve,motif,classe_eleve,montantusd,montantcdf,cdfact,date_enreg  FROM finance WHERE matricule='$matricule' and anne_acad='$anne_acad' ");
  if($requete->rowCount()== 0){
    echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
  }
  else{
  $requeteid = $bdd->query("SELECT * FROM eleve WHERE   matricule='$matricule'  ");
  $resultatid = $requeteid->fetch();
        //  

  echo '
  <table  class="table table-stripped table-bordered table-condensed"  style="background-color:white;">
        <tr>
       
        
        <th style=": 90px;">Motif</th>
       
        <th style=": 90px;">Montant en USD</th>
        <th style=": 90px;">Montant en CDF</th>
        <th style=": 100px;">CODE FACTURE</th>
        <th style=";width: 120px;">Date</th><tr>
    

    <a href="detail.php?matricule='.$resultatid['matricule'].'" >
  <ul  class="list-group">
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

  <li class="list-group-item">
        <span class="badge"> '.$anne_acad.'</span>
        Pour l\'Année Scolaire 
         
  </li>
   ';
          
             while ($resultat = $requete->fetch()){
                     
                                   
                  echo '    
                         <tr>  
                         
                         <td style="font-size: 11px;">'.$resultat['motif'].'</td>
                        
                         <td style="font-size: 11px;">'.$resultat['montantusd'].'</td>
                         <td style="font-size: 11px;">'.$resultat['montantcdf'].' Fc</td>
                         <td style="font-size: 11px;">'.$resultat['cdfact'].' </td>
                         <td style="font-size: 11px;">'.$resultat['date_enreg'].'</td>
                         </tr>  ';

                      $total1+=$resultat['montantcdf'];
                      $total2+=$resultat['montantusd'];
                      }//fin while

                    }//
         

      
                       
                     echo'
                        
        </table>';
       echo ' 

       <table class="table table-stripped table-bordered table-condensed"  style="background-color:white;">

<tr>

       ';
       
        $selection_mois=$bdd->query("SELECT moisp,etat from mois where matricule='$matricule'  and annee_acad='$anne_acad' and etat='dispo' ") ;
        while($resulta_mois=$selection_mois->fetch()){
        echo '<td  class="alert alert-danger">'.$resulta_mois['moisp'].' </td>


       '; }

       echo'</tr>



                      
                       



       </table>';


               echo'  

          <ul class="list-group">
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

}


?>

 
    



<?php include('footer.php');  ?>


 <script>
  $( "#autocomplete2" ).autocomplete({
                           source: '__liste_reinscripton2.php'
                       });
          </script>
    </script>