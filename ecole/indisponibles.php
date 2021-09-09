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

<div class="row">
   <div class="col-lg-12">
   <label>Suivi des Abadons et Autres</label>
<form class="form-inline">
  <select class="form-control classe">
  <option value="0">----Choix Classe----</option>
  <option value="1">Toutes les Classes</option>
<?php  $classe=$bdd->query("SELECT nomclasse FROM classe ORDER BY niveau desc ");
     while($classes=$classe->fetch()){
     	echo'<option>'.$classes['nomclasse'].'</option>';
     }

     ?>
  	
  </select>


  <select class="form-control status">
   <option value="0">----Choix Status----</option>
   <option value="1">Tous les Status</option>
<?php  $status_select=$bdd->query("SELECT status FROM status  ");
     while($status=$status_select->fetch()){
     	echo'<option>'.$status['status'].'</option>';
     }

     ?>
  	
  </select>


   <select class="form-control annee">
  

<?php  $annees_select=$bdd->query("SELECT annee FROM anne_scolaire order by id desc ");
     while($annees=$annees_select->fetch()){
     	echo'<option>'.$annees['annee'].'</option>';
     }

     ?>
  	
  </select>

  <input type="button" class="btn btn-success searchBtn" value="Recherche" >

</form>

   </div>

   </div>


   <div class="row">

        <div class="col-lg-12">

           <table class="table table-stripped table-border InfoResultRequest">

              <tr>
                   <td>N</td>
                   <td>Matricule</td>
                   <td>Nom</td>
                   <td>Post Nom</td>
                   <td>Classe</td>
                   <td>Année</td>
                   <td>Status</td>

              	


              </tr>
           	
           </table>



   </div>
   </div>

  

 




<hr>

<?php include('footer.php');  ?>


<script type="text/javascript" src="js/__requette_abandon.js"></script>