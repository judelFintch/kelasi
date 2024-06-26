<?php include('header.php'); ?>
<script type="text/javascript" src="minichat.js"></script>
<body>
      <div id="conteneur">
      <script type="text/javascript">
      function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 	}
   
</script>

<style type="text/css">
    #div1{ font-size: 16px; font-style: verdana; height: 300px; width: 600px
  }

  #table{ margin-left: 300px;


  }

  #ms{ font-size: 11px

  }

</style>
<?php
$_GET['matricule'];
  if(isset($_GET['matricule'])){
  $selection_numero_facture=$bdd->query(" SELECT id FROM facture ORDER BY id DESC LIMIT 1");
    $facture=$selection_numero_facture->fetch();
    $Initial="FA";
    $id=$facture['id']+1;
    $numfact=$Initial.$id;
    #################information eleve###########################
    $matricule=$_GET['matricule'];

        $selection_de_eleve=$bdd->query("SELECT nom,postnom,promotion from eleve where matricule='$matricule' and annacad='$annacad'")or die(print_r($bdd->errorInfo()));;
        $resultat=$selection_de_eleve->fetch();
        $nom_ele=$resultat['nom'].' '.$resultat['postnom'];
        $classe=$resultat['promotion'];
    ###############################################################
  $selection_pour_facture=$bdd->query("SELECT  * FROM tempons");

  	################################################################################################
  	echo '
   <div id="div1" > 
   <div id="facture">
           <tr>
             
                 <td><center> <b> Republique Démocratique du Congo</center></b><td>
                  <tr>

                   <td><center> '.$entete=$info_entete['Entete'].'</center></td>

                   </tr>
                    <tr>

                   <td><center> '.$entete=$info_entete['siteweb'].'</center></td>

                   </tr>
                   <tr>

                   <td><center> tel(s): '.$info_entete['telephone'].'</center></td>

                   </tr>

                   <tr>

                   <td><center>  '.$info_entete['email'].'</center></td>

                   </tr>

                   <tr>

                   <td><center>'.$info_entete['adresse'].'</center></td>

                   </tr>
                        <i>

                        <tr>

                                <td><center>Année Sc. '.$annacad.'</center></td></tr>
                               <tr><td><center> Facture '.$numfact.'</center></td></tr>
                 <tr><td><center>Date '.$date.', '.$heure.'</center.</td></tr><br>
                 

                            </i>
            
           
           </tr>

  

                <br>------------------------------------------------------<br>
                '.$nom_ele.', Classe:'.$classe.'

                <br>
                ---------------------------------------------------------

<table class="table">
 <td>N</td>
 <td>Libelle</td>
 <td>Qte</td>
 <td>CDF</td>
 <td>USD</td>
 <td>T. CDF</td>
  <td>T. USD</td>
 
 
 
 </tr>
  ';

$n=0;
$montant=0;
$montantusd=0;
  while($val=$selection_pour_facture->fetch()){
  	$n++;


   echo '

         <tr>
      

               <td width="20">'.$n.'</td>
  
  <td>'.$val['libelle'].'</td>
  <td>'.$val['qte'].'</td>
  <td>'.$val['prix_cdf'].'</td>
  <td>'.$val['prix_usd'].'</td>
  <td>'.$val['prix_cdf']*$val['qte'].'</td>
  <td>'.$val['prix_usd']*$val['qte'].'</td>
  
 
  

  </tr>


                    

';

$montant+=$val['prix_cdf']*$val['qte'];
$montantusd+=$val['prix_usd']*$val['qte'];


}

echo '
       

      </tr>

             <tr>
  <td></td>
    <td></td>
              <td>Total</td>
                <td width="100">'.$montant.' CDF </td>
                <td width="100">'.$montantusd.' USD</td>
              
            
            
              <td >Taux:'.$taux.'</td>
              
            
              <td></td>
 	


 </tr>
    
</table>	
	

	 

   </div> </div>
  ';


  	################################################################################################

       

    


    	$selection_article=$bdd->query("SELECT * FROM  tempons");

    	  while ($tabdonnees=$selection_article->fetch()){

          $devise=$tabdonnees['devise'];
          $article=$tabdonnees['libelle'];
          
          

    	  

   if($devise=="CDF"){
      $kt=$tabdonnees['qte']*$tabdonnees['prix_cdf'];
    $re2=$bdd->query("insert into finance values('','$nom_ele','$matricule','$classe','$article','0','$kt','$annacad','$date','CDF','Achat','$taux','$numfact')")or die(print_r($bdd->errorInfo()));
     $re3=$bdd->query("insert into autre_frais values('','$nom_ele','$matricule','$classe','Achat','$kt','CDF','$annacad','$date','$numfact')")or die(print_r($bdd->errorInfo()));
      $bdd->exec('INSERT INTO facture VALUES()');
    
      }
    else{ 
      $kt=$tabdonnees['qte']*$tabdonnees['prix_usd'];
       $re2=$bdd->query("insert into finance values('','$nom_ele','$matricule','$classe','$article','$kt','0','$annacad','$date','USD','Achat','$taux','$numfact')")or die(print_r($bdd->errorInfo()));
       $re3=$bdd->query("insert into autre_frais values('','$nom_ele','$matricule','$classe','Achat','$kt','USD','$annacad','$date','$numfact')")or die(print_r($bdd->errorInfo()));
        $bdd->exec('INSERT INTO facture VALUES()');
      }
    	$delete=$bdd->query("DELETE FROM tempons");


    	  }








  }

  




?>

 </div> </div></div>
<input type="button" value="Imprimer"  onclick="printContent('div1')"/>
 <a href="vente.php">Acceuil</a>
</form>


<?php  //require('footer.php');  ?>