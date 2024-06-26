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
<link rel="stylesheet" href="dist/css/bootstrap.css"  />
<link rel="stylesheet" href="dist/css/bootstrap-theme.css"  />
<link rel="stylesheet" href="dist/css/bootstrap.min.css"  />
<link rel="stylesheet" href="dist/css/moncss.css"  />
<script src="monjs.js" type="text/javascript"></script>

<title>College Salem</title>
</head>
<style>
body{
font-size:11px;
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
<div id="conteneur_principal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- debut conteneur principal -->
<?php
if(isset($_POST['classe'])){
$classe=$_POST['classe'];

   

?>
<div style=" background-color: #5bc0de;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                
        
<div style=" background-color: #666;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div style="position: relative;float: left;left: 100px;"><h4 style="color:white; text-align: center;">
<?php echo 'Rapport du  '.$classe.'   ';  ?>  </h4></div>
<div style='position: relative;float:left;left: 57%;top: 4px;'>

        <form action="suivi_de_payement.php" method="post" id="jn">
        <select name="classe">
        <option value="Pre-Ma">Pre-Ma</option>

        <?php $selection_de_classe=$bdd->query("SELECT nomclasse FROM classe "); ?>
                  <?php while ( $liste_classe=$selection_de_classe->fetch()) {
                    echo '<option value="'.$liste_classe['nomclasse'].'">'.$liste_classe['nomclasse'].'</option>';
                  }
                  ?>
                  
                </select>
          <input type="submit" value="Afficher" class="btn btn-primary" />
        </form>
      

<form action="detaileleves.php" method="POST">
<input type='submit' class="btn btn-success" onclick="this.style.display='none'; print();" name ='imprimerliste' value="<?php echo 'Imprimer la page '; ?> "/></form>

</div>
</div>
<table border='1'  class="table table-hover">
<th style="background: #f2dede;width: 130px;" style="font-size: 12px;">Nom et Post Nom </th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">SEPTEMBRE</th>
<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">OCTOBRE</th>
<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">NOVEMBRE</th>
<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">DECEMBRE</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">JANVIER</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">FEVRIER</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">MARS</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">AVRIL</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">MAI</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>
<th style="background: #f2dede;width: 10px;" style="font-size: 12px;">JUIN</th>

<th style="width: 10px;" style="font-size: 12px;" ></th>




<?php 

        //si la date
   
     
$n=0;
      
        //selection de la table Licencetb
          
     $requete = $bdd->query("SELECT  DISTINCT matricule,nom FROM minerval where annacad='$annacad' and classe='$classe'   ");
      if($requete->rowCount()== 0){
        echo '<p style="color:red;" align="center">dd</p>';
                 }
        else{

          while ($information= $requete->fetch()){
             $matricule=$information['matricule'];
            $n++;
             echo'<tr><td></td></tr><td>'.$information['nom'].'</td>';
                      
                       $selection_de_mois=$bdd->query("SELECT nom,mois,montant from minerval  where matricule='$matricule' AND annacad='$annacad'   ");
                       while($resultat_info=$selection_de_mois->fetch()){

                        echo '<td >'  .$resultat_info['mois'].'(ok)(' .$resultat_info['montant'].')<td>';

                       }
                        
                 
                        
                        # code...
                      }
                      
       }
                   

                    
                 

               

                

             
              }
          

                 ?>

                 </table>
</div>
</body></html>
