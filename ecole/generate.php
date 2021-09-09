<?php include('header.php'); ?>
<body>
<div class="row">
<div class="col-lg-4">
  <form method="post">
   <button name="generate" class="btn btn-success">Generate</button>

   </form>
   <hr>

</div>

<div class="col-lg-8">
  <table class="table ">
  <thead>
  	<tr>
  		 <td>N</td>
  		 <td>Cryptage</td>
  		 <td>Code</td>
  	</tr>
  </thead>
  <tbody>
  	
  	<?php 
  	$code_recpt=$bdd->query("SELECT * FROM audrey ");
  	 while($codes=$code_recpt->fetch()) {
  	 	 echo '<tr>
  		    <td>'.$codes['id'].'</td>
  		    <td>'.$codes['code'].'</td>
  		     <td>'.md5($codes['code']).'</td>		
  		    </tr>
  		';
  	 }
  	 
  		?>
  
  </tbody>
  <tfoot>
  <tr>
  		 <td>N</td>
  		 <td>Code</td>
  	</tr>
  	
  </tfoot>
  	
  </table>
   

</div>
    
	</div>

<?php 
      if(isset($_POST['generate'])){	
      	for($i=1;$i<=30;$i++){
      		$generate='XVC'.rand(1,100).rand(500,900).$i;
      		$generate=$generate;
      		$insertion=$bdd->query("INSERT INTO audrey values('','$generate',true)") or die(print_r($bdd->errorinfo()));
         }

      }
include('footer.php');  ?>
<script type="text/javascript" src="js/__affichage_facture.js"></script>