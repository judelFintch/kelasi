  <?php include('header.php'); ?>
</head>

<body>

		
		
		
<h3><font color="green"><center>Rapport de Production Selon un critaire</center></font></h3>
<article style="background-image:url(.jpeg); background-size:100px 100%; border:1px solid grey; padding:5px">



<p>
<form method="POST" action="liste_derogation.php" class="form-inline">
      <label>PAR TYPE:</label>
           <select name = "type" class="form-control">
           <?php
                $r=$bdd->query("SELECT distinct mois FROM  derogation ");
                 while($user=$r->fetch())
                 echo'<option>'.$user['mois'].'</option>';
             ?>
          </select>

        <select name = "classe" class="form-control">
                <option value='1'>Toutes les classes</option>
                    <?php
                        $r=$bdd->query("SELECT distinct classe FROM  derogation ");
                        while($user=$r->fetch())
                        echo'<option>'.$user['classe'].'</option>';
                     ?>
       </select>
       <input type="submit" class="btn btn-info" value="Afficher" class="btn btn-info"></td>

</form>

</p>







</div>
</article>
</body>


<?php include('footer.php');  ?>
 

