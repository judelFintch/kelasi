<?php  
 include('header.php'); 
$nom=htmlentities($_GET['nom']);
$motif=htmlentities($_GET['motif']);
$devise=htmlentities($_GET['devise']);
$compte=htmlentities($_GET['compte']);
$montant=htmlentities($_GET['montant']);
 ?>


<script type="text/javascript">
   
    function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
 	
	}
   
   </script>

<style type="text/css">
	
	#div1{ font-size: 16px; font-style: verdana;



	}

	#table{ margin-left: 300px;


	}

	#ms{ font-size: 11px

	}

</style>

</head>
          <div id="div1"> 

          <tr>
                   
                     <p class="entete">
                     <?php  

                     echo '
				  
				  <table id="table">
                  
				           <td><center> '.$entete=$info_entete['Entete'].'</center></td>

				           </tr>
                    <tr>

                   <td><center> '.$entete=$info_entete['siteweb'].'</center></td>

                   </tr>
                   <tr>

                   <td><center> tel(s): '.$info_entete['telephone'].'</center></td>

                   </tr>

                   <tr>

                   <td><center>  '.$info_entete['email'].'</center></td>

                   </tr>

                   <tr>

                   <td><center>'.$info_entete['adresse'].'</center></td>

                   </tr>
                   <tr>

                   <td><center>'.$_GET['code'].'</center></td>

                   </tr>
				    
                          
                        

				  </p>

   <tr>
<td>--------------------------------------------------</td>
       <tr>  <td>Bon de Sorti Pour Mdm(Mr) :.....'.$nom.'</td></tr>
<tr>
<td>---------------------------------------------------   </td>        
</tr>
  
	
	  ';?> 

<?php echo'

    
                <tr>

                

                <td>Motif.................</b>  </td>
                  <td> <b> '.  $motif.'</b>  </td>
                </tr>

                <tr>

                

                <td>Montant </b>  </td>
                  <td> <b> '.  $montant.'</b>'.$devise.'   </td>
                </tr>
                 
	
	
	';

	?>
	

</table>
</div>


<input type="button" value="Imprimer"  onclick="printContent('div1')"/>
 <a href="depense.php">Retour</a>
</form>

   
  </div>

	<?php include('footer.php');  ?> 
	
