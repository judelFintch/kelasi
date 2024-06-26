 
  <?php include('header.php'); ?>
</head>
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

</style>
<body>

<?php
if(isset($_POST['eleve'])){
 $type_reche=htmlentities($_POST['eleve']);
 $du=htmlentities($_POST['du']);
 $au=htmlentities($_POST['au']);


   $total1=0;
   $total2=0;
   $total_depnese_cdf=0;
   $total_depnese_usd=0;

?>

                
        

<?php echo $type_reche.' du ' .$du.' Au '.$au;  ?>	</h4>



<table class="table table-striped ">
        <tr>
        <th >NUMERO OPERATION</th>
        <th >COMPTE</th>
        <th >SORTIE VERS</th>
        <th >MONTANT USD </th>
        <th>DEVISE</th>
         <th>CODE D.</th>
             <th>DEVISE</th>
        <th>DATE</th>
       <tr>
<?php 
$n=0;

if($type_reche=="Toutes les sorties"){
$requete = $bdd->query("SELECT *  FROM depense WHERE date_s  BETWEEN  '".$du."' and '".$au."' order by date_s asc    ")or die(print_r($bdd->errorinfo()));
}
elseif ($type_reche<>"Toutes les sorties") {

$requete = $bdd->query("SELECT * FROM depense WHERE   date_s  BETWEEN  '".$du."' and '".$au."' and compte_s='$type_reche' and annee_acad_s='$annacad' order by date_s asc ") or die(print_r($bdd->errorinfo()));
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
                         <td style="font-size: 11px;">'.$n.'</td>
                         <td style="font-size: 11px;">'.$resultat['compte_s'].'</td>
                         <td style="font-size: 11px;">'.$resultat['motif_s'].'</td>
                         <td style="font-size: 11px;">'.$resultat['montantusd_s'].'</td>
                         <td style="font-size: 11px;">'.$resultat['montantcdf_s'].'</td>
                          <td style="font-size: 11px;">'.$resultat['code_sortie_s'].'</td>
                         <td style="font-size: 11px;">'.$resultat['devise_s'].'</td>
                         <td style="font-size: 11px;">'.$resultat['date_s'].'</td>
                         
                         </tr> 	';

                      $total1+=$resultat['montantcdf_s'];
                      $total2+=$resultat['montantusd_s'];
                      }//fin while

                    }//
         

      }
                       
                     echo'
                        
                        <td style="background: #f2dede;font-size: 11px;">
                        <b>Total</b></td>
                        <td style="background: #f2dede;font-size: 11px;"></td>
                        <td style="background: #f2dede;font-size: 11px;"><b>
                        </b></td>
                        <td style="background: #f2dede;font-size: 11px;"><b></b></td>
                        <td style="background: #f2dede;font-size: 20px;"><b>'.$total2.' ($)</b></td>
                        <td style="background: #f2dede;font-size: 20px;"><b>'.$total1.' (FC)</b></td>
                        <td style="background: #f2dede;font-size: 12px;"></td>
                        <td style="color:red;font-size: 17px;background: #f2dede;font-weight: bold;font-size: 12px;""><b> </b></td></tr>
        </table>';?>

</div>
</body></html>
