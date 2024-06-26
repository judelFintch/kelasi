<?php 

	session_start();
	 if(isset($_SESSION['user'])){
	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:../index.php");}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accueil || <?php echo $entete ?></title>
<?php include('liens_boostrap.php') ?>
<style type="text/css">
#hed,#re{
display:table-cell;
}
#he{
background-color:black;
color:royalblue;}

#txt{
width:50%;}
#img,#txt{
display:table-cell;}
li{
	list-style-type: none;
}
</style>
</head>

<body>
	<?php include('header.php'); ?>

<p>


<div class="panel panel-default">
  <div class="panel-body">




 

  <?php  



   $selection_classe=$bdd->query("SELECT * FROM classe  ORDER BY categorie_classe");

   while ($selection=$selection_classe->fetch()) {
     # code...
  

     echo'
  <p>
 <form class="form-inline" method="post">

  <div class="form-group">

    <label class="sr-only" for="exampleInputEmail3">Classe</label>
    <input type="hidden" class="form-control" id="exampleInputEmail3" value="'.$selection['codeclasse'].'"" readonly="" name="code" >
  </div>

  <div class="form-group">

    <label class="sr-only" for="exampleInputEmail3">Classe</label>
    <input type="text" class="form-control" id="exampleInputEmail3" value="'.$selection['nomclasse'].'"" readonly="" name="classe" >
  </div>

  <div class="form-group">

    <label class="sr-only" for="exampleInputEmail3">Classe</label>
    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" value="'.$selection['categorie_classe'].'"" readonly="" name="classe" >
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Frais Inscription</label>
    <input type="number" class="form-control" id="exampleInputPassword3" name="fr" placeholder=" Frains Insciption '.$selection['frais_inscitpion'].' USD" ">
  </div>


  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Capacite Acceuil restante</label>
    <input type="number" class="form-control" id="exampleInputPassword3" name="cap" placeholder=" Capacité Restante '.$selection['capacite'].'"">
  </div>
  
       <button type="submit" class="btn btn-success">Modifier</button>
    </form>

    </p>
    
';

 }

?>














<?php 

  if(isset($_POST['code'])){


   $code=$_POST['code'];

    if(!empty($_POST['fr'])){
     $frais_inscitpion=$_POST['fr'];

      $bdd->query("UPDATE classe SET frais_inscitpion='$frais_inscitpion' WHERE codeclasse='$code'");




    }

    if(!empty($_POST['cap'])){
       $capacite=$_POST['cap'];

         $bdd->query("UPDATE classe SET capacite='$capacite' WHERE codeclasse='$code'");

       



    }

    header("location:capacite_classe.php");

    









  }

  ?>




  </div>
</div>




</div>



<?php include("recherche.php");include('footer.php');?>	
		
</body>
</html>


