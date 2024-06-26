<?php include('header.php'); ?>
</head>
<?php 
   if(isset($_GET['matricule'])){
      echo '<input type="hidden" value='.$_GET['matricule'].' class="matricule">'; 
        //$information_eleve=$bdd->query("SELECT * FROM eleve WHERE matricule ");
   }
   else{
    exit();
   } 
?>
<body>
<input type="button"  class="btn btn-success" value="Imprimer"  onclick="printContent('div1')"/>
<div id="div1" > 
   <div class="facture">
                   <tr>
                     <td><center> <?php echo $entete=$info_entete['Entete']?></center></td>
                      </tr>
                    <tr>
                   <td><center> <?php  echo $entete=$info_entete['siteweb'] ?></center></td>
                   </tr>
                   <tr>
                   <td><center> tel(s): <?php echo $info_entete['telephone']?></center></td>
                   </tr>
                   <tr>

                   <td><center>  <?php echo $info_entete['email'];?></center></td>

                   </tr>

                   <tr>

                   <td><center><?php echo $info_entete['adresse']; ?></center></td>

                   </tr>
                        <i>

                        <tr>
                               
                      <tr><td><center> <b class="codefacture"></b></center></td></tr>
                <tr><td><center> <?php echo $date.', '.$heure ?></td></tr>
                 <td><center>Année Sc. <?php echo $annacad ?></center></td></tr>
                 

                            </i>
            
                           ------------------------------------<br>
                <span class="InformationEleves"></span> 
               
               <br>------------------------------------<br>
               <table class="table table-striped table-bordere">
    <tr>
            <td>Article</td>
            <td>PU</td>
            <td>Qte</td>
            <td>T.$</td>
            <td>T.Fc</td>
          </tr> 
       
                       
     </table>                  
                 
  </center>
  <span class="info pull-right"><?php echo $info_entete['par']; ?></span>
                </div> </div>


</body>
<script type="text/javascript">
   
    function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
  
  }
   </script>
  <script type="text/javascript" src="js/__gestionAppoinSurfacture.js"></script>
  