  <?php include('header.php'); ?>
<?php
    if(isset($_SESSION['session_temporaire'])){
     }
     else{
      exit();
     }
?>
<body>		
<hr>
<article">

<p>
<form class="form-inline" action="bilan.php" method="post" >
      <div class="form-group">
      <label>Bilant </label>

          
                <input type='date' class="form-control"  name='du' value="<?php echo date('Y-m-d')?>">
                <input type='date' class="form-control"  name='au' placeholder='date' value="<?php echo date('Y-m-d')?>" >
                <button type="submit"   class="btn btn-info">Afficher</button>
        </div>

</form>

<form class="form-inline" action="pardate.php" method="post" >
<label>Rapport</label>
      <div class="form-group">
          
                <input type='date' class="form-control"  name='du' value="<?php echo date('Y-m-d')?>">
                <input type='date' class="form-control"  name='au' placeholder='date' value="<?php echo date('Y-m-d')?>" >
                <button type="submit"   class="btn btn-info">Afficher</button>
        </div>

</form>



<p></p>

<form class="form-inline" action="selons.php" method="post">
      <div class="form-group">
           
                 <input type='date' name='du' class="form-control"  value="<?php echo date('Y-m-d')?>">
                 <input type='date' name='au' class="form-control"  placeholder='date' value="<?php echo date('Y-m-d')?>">
                                 <button type="submit" class="btn btn-info">Afficher</button>
      </div>
       
</form>

</p>


<p><legend>En Ordre</legend>
  <hr>
<form method="POST" action="par_type.php" class="form-inline">
     
         
           <select name = "type" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct motif FROM  finance where type<>'Frais fonctionnement' and type<>101 and type<>'Appoint Litige' and type<>'Frais Appoint'");
                 while($user=$r->fetch())
                 echo'<option>'.$user['motif'].'</option>';
             ?>
          </select>

        <select name = "classe" class="form-control">
                <option value='1'>Toutes les classes</option>
                    <?php
                        $r=$bdd->query("SELECT distinct classe FROM  minerval ");
                        while($user=$r->fetch())
                        echo'<option>'.$user['classe'].'</option>';
                     ?>
       </select>
       <input type="submit" class="btn btn-info" value="Afficher" class="btn btn-info"></td>

</form>

</p>

<p>
<form method="POST" action="liste_deux.php" class="form-inline">
    
           <select name = "mois" class="form-control">
            <?php
                  $r=$bdd->query("SELECT distinct mois FROM  minerval order by id asc ");
                  while($user=$r->fetch())
                  echo'<option>'.$user['mois'].'</option>';
              ?>
           </select>

            Classe :
                   <select name = "classe" class="form-control">
                    <option value='1'>Toutes les classes</option>
                     <?php
                      $r=$bdd->query("SELECT distinct classe FROM  minerval ");
                      while($user=$r->fetch())
                      echo'<option>'.$user['classe'].'</option>';
                    ?>
                   </select>               

                <input type="submit" value="Afficher" class="btn btn-info"></td>

</form>
<p></p>



<hr>

<legend>Litige</legend>

<p>
  <hr>
<form method="POST" action="litige_part.php" class="form-inline">
     
         
           <select name = "type" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct motif FROM  finance where type<>'Frais fonctionnement' and type<>101 and type<>'Appoint Litige' and type<>'Frais Appoint'");
                 while($user=$r->fetch())
                 echo'<option>'.$user['motif'].'</option>';
             ?>
          </select>

        <select name = "classe" class="form-control">
                <option value='1'>Toutes les classes</option>
                    <?php
                        $r=$bdd->query("SELECT distinct classe FROM  minerval ");
                        while($user=$r->fetch())
                        echo'<option>'.$user['classe'].'</option>';
                     ?>
       </select>
       <input type="submit" class="btn btn-info" value="Afficher" class="btn btn-info"></td>

</form>

</p>

<p>
<form method="POST" action="liste_deux.php" class="form-inline">
    
           <select name = "mois" class="form-control">
            <?php
                  $r=$bdd->query("SELECT distinct mois FROM  minerval order by id asc ");
                  while($user=$r->fetch())
                  echo'<option>'.$user['mois'].'</option>';
              ?>
           </select>

            Classe :
                   <select name = "classe" class="form-control">
                    <option value='1'>Toutes les classes</option>
                     <?php
                      $r=$bdd->query("SELECT distinct classe FROM  minerval ");
                      while($user=$r->fetch())
                      echo'<option>'.$user['classe'].'</option>';
                    ?>
                   </select>               

                <input type="submit" value="Afficher" class="btn btn-info"></td>

</form>
<p></p>



<hr>


<p>

<form method="POST" action="rapport_depense.php" class="form-inline">
           
             <select name="eleve" class="form-control">
                <option value="Toutes les sorties">Toutes les sorties</option>
                <?php
                     $re=$bdd->query("select distinct  compte_s from depense where compte_s<>''  ");
                     while($date=$re->fetch()){
                     echo'<option value="'.$date['compte_s'].'">'.$date['compte_s'].'</option>';
                 }
               ?>
               </select>

<input type='date' name='du' class="form-control" placeholder='date' value="<?php echo date('Y-m-d')?>" >
<input type='date' name='au' class="form-control" placeholder='date' value="<?php echo date('Y-m-d')?>" >

 <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>

<td><input type="submit" value="Afficher" class="btn btn-info">

</form>









</body>





<?php include('footer.php');  ?>
 

