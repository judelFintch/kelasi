<?php include('header.php'); ?>
<body>
  <?php 
      if(isset($_GET['classe'])){ 
         if($_GET['classe']==1){
          $selection_classe=$bdd->query('SELECT nomclasse,categorie_classe FROM classe order by niveau asc ') or die(print_r($bdd->erroInfo()));
               while($lclasse=$selection_classe->fetch()){
                    echo'
                    <a class="btn btn-info" href="voir.php?class='.$lclasse['nomclasse'].'">'.$lclasse['nomclasse'].'
                             </a>
                                                     
                         </li>';
                     }

            }
        if($_GET['classe']==2){
            $selection_classe=$bdd->query("SELECT nomclasse,categorie_classe FROM classe where categorie_classe='Maternele' order by niveau asc");
                    while($lclasse=$selection_classe->fetch()){
                    echo'
                             <a class="btn btn-info" href="voir.php?class='.$lclasse['nomclasse'].'">'.$lclasse['nomclasse'].'
                             </a> 
                         </li>';
                     }
            }


         if($_GET['classe']==3){
            $selection_classe=$bdd->query("SELECT nomclasse,categorie_classe FROM classe where categorie_classe='Primaire'  order by niveau asc");

                    while($lclasse=$selection_classe->fetch()){
                    echo'
                       
                             <a class="btn btn-info" href="voir.php?class='.$lclasse['nomclasse'].'">'.$lclasse['nomclasse'].'
                             </a>
                          
                            
                         </li>';}

                         }

                         if($_GET['classe']==4){

					$selection_classe=$bdd->query("SELECT nomclasse,categorie_classe FROM classe where categorie_classe='Secondaire' order by niveau asc ");

                    while($lclasse=$selection_classe->fetch()){
                    echo'
                       
                             <a class="btn btn-info" href="voir.php?class='.$lclasse['nomclasse'].'">'.$lclasse['nomclasse'].'
                             </a>
                          
                            
                         </li>';}

                         }





                         }
					?>
			


<?php include('footer.php');  ?>