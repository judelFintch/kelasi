<?php include('header.php'); ?>
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
   <script>
      $("table").dataTable({
          'searching' : true
});
   </script>
 <?php
 $requete = $bdd->query("SELECT id,matricule,nom,prenom,promotion,categorie,adresse,postnom,etat FROM eleve WHERE  annacad='$annacad'  AND etat='disponible' order by promotion, nom ,promotion asc  ")or die(print_r($bdd->errorInfo()));
	if($requete->rowCount()== 0){

		echo '<p style="color:red;" align="center">Nos fillatrage</p>';
	}
$requete = $bdd->query("SELECT id,matricule,nom,prenom,promotion,categorie,adresse,postnom,etat FROM eleve WHERE  annacad='$annacad' AND etat='disponible'  order by promotion, nom asc ")or die(print_r($bdd->errorInfo()));
   ?>
   <div id="div1">  
            <table class="dataTable" data-role="datatable" data-searching="true">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Post Nom</th>
                    <th>Prenom</th>
                    <th>Promotion</th>
                    <th>Etat</th>
                    <th>Situation</th>
                </tr>
                </thead>

                <tfoot>
                 <tr>
                    <th>Nom</th>
                    <th>Post Nom</th>
                    <th>Prenom</th>
                    <th>Promotion</th>
                    <th>Etat</th>
                    <th>Situation</th>
                </tr>
                </tfoot>  <tbody>
    <?php       	
              
                while ($resultat = $requete->fetch()){
         	      echo '
                <tr>
                    <td>'.$resultat['nom'].'</td>
		            <td>'.$resultat['postnom'].'</td>
		            <td>'.$resultat['prenom'].'</td>
		            <td>'.$resultat['promotion'].'</td>
		            <td>'.$resultat['etat'].'</td>
			        <td><a href="situation.php?matr='.$resultat['matricule'].'">S. GENERALE </a></td>
                </tr>  ';
                 };
         ?>
             </tbody>
            </table>
         <!-- End of example table -->
</div>
<input id="button" type="button" value="Imprimer"  class="btn btn-success pull-right" onclick="printContent('div1')"/>
<hr>


<?php include('footer.php');  ?>