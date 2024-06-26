<?php include('header.php'); ?>
<body>
<?php
if(isset($_GET['matricule'])){
    $matricule=htmlspecialchars($_GET['matricule']);
     $selection_de_eleve=$bdd->query("SELECT nom,postnom,promotion,sexe,categorie_classe,matricule, annacad from eleve where matricule='$matricule'")or die(print_r($bdd->errorInfo()));;
       $resultat=$selection_de_eleve->fetch();
       $promotion=$resultat['promotion'];
       $nom_ele=$resultat['nom'].' '.$resultat['postnom'];
       $categorie_classe=$resultat['categorie_classe'];
       $matricule=$resultat['matricule'];
       $annacad_old=$resultat['annacad'];
?>
<div class="alert alert-success" role="alert">
    	<center>Achat Object Classique ou Autres Frais</center>
	        Information Eleve<BR>
	        Nom Eleve: <?php  echo $nom_ele?> <br>
	        Promotion :<?php echo $promotion?><br>
	        Sexe :<?php  echo $resultat['sexe']?><br>
          Matricule :<?php  echo $resultat['matricule']?><br>
          Annee Scolaire :<?php  echo $resultat['annacad']?>
</div>
<div class="row">
  <div class="col-lg-10">
  <input type="hidden" value="<?php  echo $matricule?>" class="matricule">
  <input type="hidden" value="<?php  echo $annacad_old?>" class="annacad">
<!--Frais Appoints-->
<div class="form-inline">
      <label>Frais Appoint</label>
        <select class="form-control libelle_mois" id="libelle_mois" >
     <?php 
       $selection_mois_eleve=$bdd->query("SELECT * FROM mois where matricule='$matricule' and annee_acad<>$annacad and etat='dispo' and moisp not in('juin')");
         while($mois_impayer=$selection_mois_eleve->fetch()){
          $oldanne=$mois_impayer['annee_acad'];
          echo '<option>'.$mois_impayer['moisp'].'</option>';
     }
  ?>
        </select>
       <input type="button"  value="Envoyer" class="btn btn-success btnAppoint" " />
     
  <!--fin frais -->
<!-- frais unique  -->
      <label>Autres Frais</label>
<select class="form-control libelle_autres" id="libelle" >
<?php 
    $selection_frais=$bdd->query("SELECT * FROM unique_frais where (section='Toutes les sections' OR section='$categorie_classe') ") or die(print_r($bdd->errorInfo()));
     while($frais=$selection_frais->fetch()){
                echo '<option value="'.$frais['id'].'">'.$frais['libelle'].'</option>';
     }
?>
   </select>
  
<input type="button"  value="Envoyer" class="btn btn-success btnAutresfrais"/>
       </div>
    </div>
</div>
<hr>
<div class="panier"></div>
<!--fin frais -->
<?php }include('footer.php');  ?>
<script type="text/javascript" src="js/__traitement_litige.js"></script>
