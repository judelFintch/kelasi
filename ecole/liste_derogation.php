<?php 
  session_start();
   if(isset($_SESSION['user'])){
     require_once('../bdd_app_gst_connect/allscirpt.inc.php');
    
      //$rech = $_GET['class'];
   
  }
   else{
   header("Location:../index.php");}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<?php  require_once('liens_rapport.php');?>

<title><?php echo $entete?></title>
</head>
<style>
body{
background-color:#fff;}
#entete{
background-color:#333333;
}
#question{
margin-top:10px;}
#navigation{
margin:0px;}
#menuv li{
list-style-type:none;
}
.li{
list-style-type:none;}

.al{
display:block;
border-bottom:1px solid #ccc;}
.al:hover{
background-color: #EBEBEB;}
#pied{
position:fixed;
bottom:0px;
margin:0px;

}
#pr{

}

.quest{
border-bottom:1px solid #ccc;
padding-bottom:4px;}
.ac{
color:white;}
.ac:hover{
color:blue;
text-decoration:none;}
#dernier_rep,#dernier_com{
/*border:1px solid #ccc;*/
}
#conteneur_principal,#navigation,#entete,#gauche{
margin:0px;
padding:0px;}
#corps{
padding-bottom:60px;
margin-left:0px;
padding-left:0px;
}

#ec{
height:40%;
}
#question{
padding:5px;
margin:0px;}
#gauche{
padding-left:0px;
border-left:1px solid #ccc;
}
#ns,#sc,#cp{
background-color:#FFFFFF;
padding:2px;
margin-bottom:10px;}

#csujet{
height:;
padding-left:0px;
margin-left:0px;
}
#sujet{
background-color:#FFFFFF;
padding:2px;
margin-top:10px;
margin-right:5px;
margin-left:0px;
}
#sujet h3{
border-bottom:1px solid #ccc;}
#sujet .p{
margin-bottom:10px;
}

#sujet p{
text-align:justify;
}
#ns{
margin-top:10px;

}
#loader1{
position:absolute; left:47%; top:40px; display:none;}
#loader2{
position:absolute; left:47%; display:none;}
.comm:hover{
background-color: #F8F8F8;}
.sujet{

}
.sujet:hover{
background-color: #F8F8F8;
text-decoration:none;
}
.dsujet:hover{
background-color: #F8F8F8;

}
.comm:hover{
background-color: #F8F8F8;

}

</style>
<body>
<div id="conteneur_principal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- debut conteneur principal -->
<?php
if(isset($_POST['type']) and isset($_POST['classe'])){
$type_reche=$_POST['type'];
 $total1=0;;
 $total2=0;

 
?>
<div style=" background-color: #5bc0de;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                
        
<div style=" background-color: #666;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div style="position: relative;float: left;left: 100px;"><h4 style="color:white; text-align: center;">
 LISTES DES ELEVES	</h4></div>
<div style='position: relative;float:left;left: 57%;top: 4px;'>
<form action="admin.php?la page en cours d'impression" method="POST">
<a   href="suivi_derogation.php"> Retour</a> 
<input type='submit' class="btn btn-success" onclick="this.style.display='none'; print();" name ='imprimerliste' value="<?php echo 'Imprimer la page '; ?> "/></form>
</div>
</div>

<table class="table table-striped ">
        <tr>
        <th style="background: #f2dede;width: 150px;">N</th>
          <th style="background: #f2dede;width: 150px;">MATRICULE</th>
        <th style="background: #f2dede;width: 200px;">NOM</th>
       
        <th style="background: #f2dede;width: 90px;">CLASSE</th>
         <th style="background: #f2dede;width: 90px;">MOIS</th>
       
       
        <th style="background: #f2dede;width: 120px;">Date Debut</th>
        <th style="background: #f2dede;width: 120px;">Date De Fin</th>

        <tr>
<?php 
$n=0;
if($_POST['classe']==1){
$requete = $bdd->query("SELECT * FROM derogation WHERE mois='$type_reche'  and annee_academique='$annacad' and etat='actif' ORDER BY classe,nom_eleve ASC ");
 }
 else{
$classe=$_POST['classe'];
$requete = $bdd->query("SELECT * FROM derogation WHERE mois='$type_reche' and classe='$classe' and etat='actif' and annee_academique='$annacad'  ORDER BY nom_eleve ASC ");
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
                         <td style="font-size: 11px;">'.$resultat['matricule'].'</td>
                         <td style="font-size: 11px;">'.$resultat['nom_eleve'].'</td>
                         
                         <td style="font-size: 11px;">'.$resultat['classe'].'</td>
                         <td style="font-size: 11px;">'.$resultat['mois'].'</td>
                         
                         <td style="font-size: 11px;">'.$resultat['date_debut'].'</td>
                          <td style="font-size: 11px;">'.$resultat['date_fin'].'</td>
                         </tr> 	';

                     
                      }//fin while

                    }//
                                
  
     }
    
      

    
                    

                     echo'
                        
                       
                        <td style="color:red;font-size: 17px;background: #f2dede;font-weight: bold;font-size: 12px;""><b> </b></td></tr>
        </table>';?>

</div>
</body></html>
