<?php 
 include('header.php'); ?>
<script type="text/javascript" src="minichat.js"></script>
<body>
  <br>
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
		#div1{ font-size: 16px; font-style: verdana;
	}
</style>
<?php
$_GET['matricule'];
  if(isset($_GET['matricule'])){
  $selection_numero_facture=$bdd->query(" SELECT id FROM facture ORDER BY id DESC LIMIT 1");
    $facture=$selection_numero_facture->fetch();
    $Initial="SLM";
    $id=$facture['id']+1;
    $numfact=$Initial.$id;
    #################information eleve###########################
        $matricule=$_GET['matricule'];
        $selection_de_eleve=$bdd->query("SELECT nom,postnom,promotion,annacad from eleve where matricule='$matricule'")or die(print_r($bdd->errorInfo()));;
        $resultat=$selection_de_eleve->fetch();
        $nom_ele=$resultat['nom'].' '.$resultat['postnom'];
        $classe=$resultat['promotion'];
        $old_annee=$resultat['annacad'];
     
    ###############################################################
    $selection_pour_facture=$bdd->query("SELECT  * FROM tempons");
  	################################################################################################
  	echo '<fieldset>
            <div id="div1"> 
                 <div id="facture">
                   

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

                                <td><center>Année Sc. '.$annacad.'</center> Taux '.$taux.'</td></tr>
                               <tr><td><center> Facture '.$numfact.'</center></td></tr>
                <tr><td><center>Date '.$date.'</center.</td></tr>
                 

                            </i>
            
           
           </tr>
</i></center>
                </div>

                ------------------------------------------<br>
                '.$nom_ele.', Classe:'.$classe.'

                <br>
                --------------------------------------------

<table class="table">
 <td>N</td>
 <td>Libelle</td>
 <td>Qte</td>
 <td>Entree CDF</td>
 <td>Total USD</td>
  </tr>
  ';
$n=0;
$montant=0;
$cdftotal=0;
$usdtotal=0;
  while($val=$selection_pour_facture->fetch()){
  	$n++;
   echo '
         <tr>
          <td width="20">'.$n.'</td>
          <td>'.$val['libelle'].'</td>
          <td>'.$val['qte'].'</td>
          <td>'.$val['prix_cdf'].'</td>
          <td>'.$val['prix_usd'].'</td>
   </tr>

';
$montant+=$val['prix_cdf']*$val['qte'];
$usdtotal+=$val['prix_usd']*$val['qte'];
}
echo '
       </tr>

             <tr>

              <td></td>
              <td></td>
              <td></td>
              <td></td>
               <td>'.$usdtotal.' USD</td>                 
 </tr>
</table>	
	   </div> </div>
  </fieldset>';

################################################################################################  
require_once('class/__update_old_year.php');
    	$selection_article=$bdd->query("SELECT * FROM  tempons");
    	  while ($tabdonnees=$selection_article->fetch()){
          $devise=$tabdonnees['devise'];
          $article=@mysql_real_escape_string($tabdonnees['libelle']);
          $compte=$tabdonnees['compte'];
          $article=$article.'('.$old_annee.')';
          $article1=filtrageVariable($tabdonnees['libelle']);
          $anneelitige=$tabdonnees['pour_annee'];
          $date_payer=date('Y-m-d');
          $motif=$tabdonnees['nature'];
if($devise=="USD"){
   $kt=$tabdonnees['qte']*$tabdonnees['prix_usd'];
   $re2=$bdd->query("insert into finance values('','$nom_ele','$matricule','$classe','$article','$kt','0','$annacad','$date','USD','$motif','$taux','$numfact','2','$compte','$anneelitige')")or die(print_r($bdd->errorInfo()));
  
   $udpate=$bdd->query("UPDATE mois SET
                                      etat='ok', 
                                      cdfact='$numfact'
                                      where matricule='$matricule'
                                      and moisp='$article1'
                                      and annee_acad='$old_annee'")
                                      or die(print_r($bdd->errorInfo()));
    UpdateOldMonth($article1,$matricule,$anneelitige);
    $bdd->exec('INSERT INTO facture VALUES()');
      }
    else{ 
     $kt=$tabdonnees['qte']*$tabdonnees['prix_cdf'];
     $re2=$bdd->query("insert into finance values('','$nom_ele','$matricule','$classe','$article','0','$kt','$annacad','$date','USD','$motif','$taux','$numfact','3','$compte','$anneelitige')")or die(print_r($bdd->errorInfo()));
      
      $bdd->exec('INSERT INTO facture VALUES()');
      }
      $delete=$bdd->query("DELETE FROM tempons");
        }

    }
//fin while
?>
<input type="button" value="Imprimer"  onclick="printContent('div1')"/>
 <a href="vente.php">Acceuil</a>
</form>
 </div> </div>
<?php  require('footer.php');  ?>