<!-- Button trigger modal -->


<!-- Modal   Modification information utilisateur-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- fin Modal   Modification information utilisateur-->





<!-- Modal   Derogation-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Derogation</h4>
      </div>
      <div class="modal-body">

      <form action="" method="post" enctype="multipart/form-data">
      <?php  $selection_compte_depense=$bdd->query("SELECT nom,matricule FROM frais_insciption where annee_scolaire='$annacad'");?>


                
      <select class="form-control"  name="nomeleve">
                <?php  while($resulta_compte=$selection_compte_depense->fetch()){
                 echo '<option value='.$resulta_compte['matricule'].'> '.$resulta_compte['nom'].'</option>' ;
                  } ?>
                </select><br /> 
        
      <input class="form-control" type="date"  name="datedebut" value="" required /><br />
      <input class="form-control" type="date" name="datefin" value="" required /><br />
        <br />
       
        <select class="form-control" name="mois">
          
          <option value="Septembre">Septembre</option>
          <option value="Octobre">Octobre</option>
          <option value="Novembre">Novembre</option>
          <option value="Decembre">Decembre</option>
          <option value="Janvier">Janvier</option>
          <option value="Frevier">Frevier</option>
          <option value="Mars">Mars</option>
          <option value="Avril">Avril</option>
          <option value="Mais">Mai</option>
          <option value="Juin">Juin</option>

        </select><br />

        
        
        <label></label><input type="submit"  class="btn btn-success" /><br /><br /> 

      </form>
       



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Fait</button>
      </div>
    </div>
  </div>
</div>

<!-- fin Modal   Modification information utilisateur-->

<?php
  
    if (isset($_POST['nomeleve'])) {
      $date=date('Y-m-d');
      
            
        $matricule = filter_var(
            htmlentities($_POST['nomeleve']),
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $datedebut= htmlentities($_POST['datedebut']);
        $datefin=htmlentities($_POST['datefin']);
        $mois=htmlentities($_POST['mois']);
        $selection_information=$bdd->query("SELECT nom,postnom,promotion FROM eleve WHERE matricule='$matricule' and annacad='$annacad' ") or die(print_r($bdd->errorInfo()));
       $resulta_info=$selection_information->fetch();
       $nom=$resulta_info['nom'].' '.$resulta_info['postnom'];


    ###########verfication ################

    $select_dernier_mois=$bdd->query("SELECT moisp FROM mois where matricule='$matricule' and etat='dispo' and annee_acad='$annacad' order by id asc limit 1");
    $dernier_m=$select_dernier_mois->fetch();

    if($dernier_m['moisp']<>$mois){

      echo '<p  class="alert alert-danger">Oups! Impossible de Faire la derogation Verifier que le mois selectionner</p>';

    }

    else{

    $selection_mois=$bdd->query("SELECT moisp,etat FROM mois where matricule='$matricule' and annee_acad='$annacad' and moisp='$mois'");
      $moisp=$selection_mois->fetch();

      $etat=$moisp['etat'];
      $moisd=$moisp['moisp'];


      if($etat=='ok' and $moisd==$mois){  


        echo'<p class="alert alert-danger">Impossible de passer la derogagation pour ce mois</p>';
        exit();


      }

      $select_derogation=$bdd->query("SELECT * FROM derogation
                                              where matricule='$matricule'
                                              and annee_academique='$annacad'
                                              and mois='$mois'
                                              ");

     $derogation_stat=$select_derogation->fetch();
     if($derogation_stat['mois']==$mois){

      echo'<p class="alert alert-danger">Derogation deja effectuer</p>';
    



     }
    else{
     
      $classe=$resulta_info['promotion'];
      $insertion_derogation=$bdd->query("INSERT INTO derogation VALUES('','$matricule','$nom','$classe','$mois','$datedebut','$datefin','actif','$annacad')") or die(print_r($bdd->errorInfo()));

            echo'<p class="alert alert-success">Derogation effectuer Avec Succes</p>';

      }

          
        }  
        
      


         
        
      }

