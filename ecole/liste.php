<?php 
  session_start();
   if(isset($_SESSION['user'])){
    require_once('../bdd_app_gst_connect/allscirpt.inc.php');
      //$rech = $_GET['class'];
   
  }
   else{
   header("Location:index.php");}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8" />
<?php  require_once('liens_rapport.php');?>

<title><?php echo $entete ?></title>
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
#retour{
  display: none
 
}


 a[href]:after {
 content:" <"attr(href)">";
 color:#fff;
 background-color:;
 font-style:italic;
 size:80%;
} 

 *[retour]:after {
 content:" [#"attr(name)"]";
 color:#fff;
 background-color:#fff;
 font-style:italic;
 size:80%;
} 


 h1[id]:after, h2[id]:after, ... {
 content:" [#"attr(id)"]";
 color:#fff;
 background-color:inherit;
 font-style:italic;
 size:80%;
} 


 *[title]:after {
 content:" ("attr(title)")";
 color:#fff;
 background-color:#fff;
 font-style:italic;
 size:80%;
} 

</style>
<body>

<div class="container">
<div class="page-header">
<h3><?php  echo $entete=$info_entete['Entete'];?></h3>
Telephone:<?php echo $info_entete['siteweb']?><br>
WebSite:<?php echo $info_entete['siteweb']?><br>

<?php echo $info_entete['adresse']?><br>

<?php
if(isset($_POST['mois'])){
         $mois=$_POST['mois'];
         $classe=$_POST['classe'];
		 if($classe==1){$mention="Toutes les classes";}
		 else{$mention=$classe;
		 }
?>


               
        
<div class="panel panel-default">
  <div class="panel-body">
  <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?php echo $user?> </a></p>
  <h4> <b> <center>RAPPORT  <?php  echo $mois.' Pour '.$classe.' || ' .$annacad ?>  </center></b> </h4> 
  </div>
</div>


<form action="rapport_finance.php" method="POST">
<input type='submit' class="btn btn-success" onclick="this.style.display='none'; print();" name ='imprimerliste' value="<?php echo 'Imprimer la page '; ?> "/></form>
</div>

<table class="table table-striped ">
        <tr>
        <th style="background: #f2dede;width: 150px;" style="font-size: 12px;">MATRICULE</th>
        <th style="background: #f2dede;width: 90px;" style="font-size: 12px;">NOM</th>
        <th style="background: #f2dede; width: 90px;" style="font-size: 12px;">Mois</th>
        <th style="background: #f2dede;width: 90px;" style="font-size: 12px;">CLASSE</th>

       
        <th style="background: #f2dede;width: 100px;"style="font-size: 12px;" >CODE FACTURE</th>
        <th style="background: #f2dede;width: 120px;" style="font-size: 12px;">Type</th><tr>

<?php 

        //selection de la table Licencetb
          if($classe==1){
		  $requete = $bdd->query("SELECT * FROM finance WHERE motif='$mois' and anne_acad='$annacad' order by  classe_eleve,nom_eleve ASC ");
		   }
		  else{
             $requete = $bdd->query("SELECT * FROM finance WHERE motif='$mois' and classe_eleve='$classe' and anne_acad='$annacad' order by nom_eleve ASC");
			 }
                if($requete->rowCount()== 0){
                  echo '<p style="color:red;" align="center"></p>';
                 }
                 else{
                   while ($resultat = $requete->fetch()){
                    if($resultat['type']==101){
                      $mention='------------------ ';


                    }
                    else{
                      $mention="Frais d'appoint";


                    }
                                   
                  echo '	
                          <tr>  
                         <td style="font-size: 11px;">'.$resultat['matricule'].'</td>
                         <td style="font-size: 11px;">'.$resultat['nom_eleve'].'</td>
                         <td style="font-size: 11px;">'.$resultat['motif'].'</td>
                         <td style="font-size: 11px;">'.$resultat['classe_eleve'].'</td>
                           <td style="font-size: 11px;">'.$resultat['cdfact'].'</td>
                           <td style="font-size: 11px;">'.$mention.'</td>
                        
                         	
 </tr>
                        
                        
                          ';



                  ;
                      }//fin while



                    }//



            

                    
  
     
    
      

      }
    
  
                         
                    
echo '

<td style="font-size: 11px;">----------------------------------</td>
                         <td style="font-size: 11px;"></td>
                         <td style="font-size: 11px;"></td>
                         <td style="font-size: 11px;"></td>
                           <td style="font-size: 11px;"></td>
                           <td style="font-size: 11px;"></td>
        </table>';?>


<?php 



 ?>
</div>
</body></html>
