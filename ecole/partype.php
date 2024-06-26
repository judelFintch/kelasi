 <?php include('header.php'); ?>

   <script type="text/javascript">
   
   function printContent(el){

    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 }
   
   </script> 

</head>
<body>
  <?php include('header.php'); ?>
<body>
<input type="button" value="Imprimer" class="btn btn-success"  onclick="printContent('div1')"/>
<form class="form-inline" action="selons.php" method="post">
      <div class="form-group">
           <label for="exampleInputName2">SELON ELEVE :</label>
                 <input type='date' name='du' class="form-control"  value="<?php echo date('Y-m-d')?>">
                 <input type='date' name='au' class="form-control"  placeholder='date' value="<?php echo date('Y-m-d')?>">
                  <select name = "annacad" class="form-control">
                 
                 <?php
                      $r=$bdd->query("SELECT distinct annee FROM  anne_scolaire order by id desc");
                      while($user=$r->fetch())
                      echo'<option>'.$user['annee'].'</option>';
                  ?>
        </select>
                 <button type="submit" class="btn btn-info">Afficher</button>
      </div>
       
</form>

<div id="div1">
<div id="conteneur_principal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- debut conteneur principal -->

</div>
</body></html>
