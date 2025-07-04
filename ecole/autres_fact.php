<?php include('header.php');?>
<body>
<!--formulaire enregistrement frais hors systeme -->
	  <div class="row">
			
<div class="col-lg-8"> 	
	 <?php 
		 if(isset($_GET['matricule'])){
		    $codeFacture=$_GET['matricule'];
		 	$requette=$bdd->query("SELECT DISTINCT matricule,nom_eleve FROM finance WHERE cdfact='$codeFacture'") or die(print_r($bdd->errorInfo()));
		 	if($requette->rowCount()==0){
		 		echo '<div class="alert alert-danger">Aucune Correspondance Facture</div>';
		 	}
		 	else{
		 		$distincInfo=$requette->fetch();
		 		$matricule=$distincInfo['matricule'];
		 		$nom_eleve=$distincInfo['nom_eleve'];
		 echo' 
           <div id="div1" > 
              <div class="facture">
                   <tr>
                        <td><center> '.$entete=$info_entete['Entete'].'</center></td>
                      </tr>
                    <tr>
                       <td><center> '.$info_entete['siteweb'].'</center></td>
                   </tr>
                   <tr>
                       <td><center> tel(s): '.$info_entete['telephone'].'</center></td>
                   </tr>
                   <tr>
                       <td><center>   '.$info_entete['email'].'</center></td>
                   </tr>
                   <tr>
                       <td><center>'.$info_entete['adresse'].'</center></td>
                   </tr>
                   <tr>
                      <td><center> <b class="codefacture">'.$_GET['matricule'].'</b></center></td>
                      </tr>
                   <tr>
                    <td><center> '.$date.', '.$heure.'</td>
                   </tr>
                 <tr>
                    <td><center>Année Sc. '.$annacad.'</center></td>
                 </tr>
            
                 ------------------------------------<br>
                <span class="InformationEleves">'.$nom_eleve.'('.$matricule.')</span> 
               
               <br>------------------------------------<br>
               <table class="table table-striped table-bordere">
    <tr>
    <td>Libelle</td>
            <td>Qte</td>
            <td>$</td>
            <td>Fc</td>
          </tr>';
     $requette_deux=$bdd->query("SELECT motif,montantusd,montantcdf,qte_acheter FROM finance WHERE cdfact='$codeFacture'");
     $n=0;
     $totcdf=0;
     $totusd=0;
   while($info=$requette_deux->fetch()){
   	       if($info['qte_acheter']==0){
   	       	$qte='---';

   	       }
   	       else{
   	       	$qte=$info['qte_acheter'];
   	       }
            echo'
            <tr>
             <td>'.$info['motif'].'</td>
            <td>'.$qte.'</td>
            <td>'.$info['montantusd'].'</td>
            <td>'.$info['montantcdf'].'</td>
          </tr>
             ';
             $totcdf+=$info['montantcdf'];
             $totusd+=$info['montantusd'];
     }
      echo '
      <tr>
         <td></td>
         <td></td>
         <td>'.$totusd.'</td>
         <td>'.$totcdf.'</td>
      </tr>           
     </table>                       
  </center>
  <span class="info pull-right">'. $info_entete['par'].'</span>
                </div> </div>
	  ';
	  }

       }?>
	 <!--Fin formulaire enregistrement frais hors systeme -->
	 </div>
	 <input type="button"  class="btn btn-success" value="Imprimer"  onclick="printContent('div1')"/>
	 </div>
 <?php  include('footer.php');?>
 <script type="text/javascript">
   
    function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
  
  }
   
   </script>



