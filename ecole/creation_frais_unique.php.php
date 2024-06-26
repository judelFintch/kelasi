<?php ob_start(); include('header.php'); ?>
<?php  include_once('class/__function.php');?>
<body>
<div class="row">
   <div class="col-lg-8">
      <form action="" method="post" enctype="multipart/form-data">
    <?php $selection_section=$bdd->query('SELECT * FROM section order by codesection desc');?>
     <?php $selection_option=$bdd->query('SELECT * FROM options_section');?>
      <?php $selection_compte=$bdd->query('SELECT * FROM jeux_de_compte');?>
       <?php $selection_annee=$bdd->query('SELECT * FROM anne_scolaire ORDER BY id DESC');?>
       <div class="row">
         <label for="compte" class="col-lg-2">Section Frais Unique</label>
           <div class="input-group col-lg-5">
                <select required class="form-control" id="section"  name="section">
           <?php  
              while($resultat_section=$selection_section->fetch()){
                  echo '<option >'.$resultat_section['section'].'</option>' ;} 
            ?>
                </select>
              </div>
           </div>
        <div class="row classe_classe">
            <label for="compte" class="col-lg-2">Classe</label>
                <div class="input-group col-lg-5">
                 <select name ="classe" id="classe_frais" class="form-control classe">
                <?php
                        $r=$bdd->query("SELECT distinct nomclasse FROM  classe");
                        while($classe=$r->fetch())
                        echo'<option>'.$classe['nomclasse'].'</option>';
                     ?></select>
              </div>
           </div>
       <div class="row options">
         <label for="compte" class="col-lg-2">option</label>
           <div class="input-group col-lg-5">
                <select required class="form-control" id="option"  name="section">
           <?php  
                   while($options=$selection_option->fetch()){
                          echo '<option>'.$options=['options_section'].'</option>' ;
                    } 
             ?>
                </select>
              </div>
           </div>

         
       <div class="row">
			<label for="devise" class="col-lg-2" >Devise</label>
				  <div class="input-group col-lg-5">
				<select class="form-control"  required=""  id="devise"  name="devise">
				     <option>USD</option>
					  <OPTION>CDF</OPTION>
				</select>
				</div>
	   </div>
        <div class="row">
           <label for="montant" class="col-lg-2">Prix</label>
             <div class="input-group  col-lg-5">
                <input class="form-control" id="prix" style="text-align:right" placeholder="Montant en USD ou en CDF" value="100"  type="number" name="montant" value="" required /><span class="input-group-addon">$ ou FC</span>
              </div>
					  </div>
            <div class="row">
                <label for="nom_ben" class="col-lg-2">Entrée</label>
                  <div class="input-group col-lg-5">
				       <input class="form-control" id="libelle" required placeholder="Libelle"   type="text" name="libelle" value="Frais" required />
				   </div>
				</div>
      <div class="row compte">
         <label for="compte" class="col-lg-2">Compte</label>
           <div class="input-group col-lg-5">
                <select required class="form-control" id="compte"  name="section">
           <?php  
                   while($compte=$selection_compte->fetch()){
          echo '<option value='.$compte['numero_compte'].'>'.$compte['libelle'].'('.$compte['numero_compte'].')</option>' ;
                    } 
             ?>
                </select>

              </div>
           </div>

        <div class="row annacad">
         <label for="annacad" class="col-lg-2">Année Scolaire</label>
           <div class="input-group col-lg-5">
                <select required class="form-control" id="annacad"  name="annacad">
           <?php  
                   while($annee=$selection_annee->fetch()){
                          echo '<option>'.$annee['annee'].'</option>' ;
                    } 
             ?>
                </select>
              </div>
           </div>
	 <div class="row">
		<div class="col-lg-7">
		    <hr>
			<input type="reset"  class="pull-right btn btn-danger" />
              <button type="button" class="pull-right btn btn-success btn-creatArticleUnique" > valider</button>   
		</div>
</div>
  </form>
 </div>
     <div class="col-lg-4">
        <div class="alertAll"></div>

        </div>
     </div>	
</body>
<script type="text/javascript" src="js/creation_frais_unique.js"></script>
<?php include('footer.php'); ob_end_flush(); ?>
