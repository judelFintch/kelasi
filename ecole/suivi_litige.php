<?php 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 	
	    //$rech = $_GET['class'];
	 
	}
	 else{
	 header("Location:index.php");}
?>
<?php include('header.php'); ?>

<style type="text/css">
body{}
#hed,#re{
display:table-cell;
}
#he{
background-color:black;
color:royalblue;}

#txt{
width:50%;}
#img,#txt{
display:table-cell;}
li{
        list-style-type: none;
}

#insc{
background-image:url(2.jpeg);
background-size:100px 100%;
padding-left:1%;
border:1px solid grey; }

label{
display:block;
float:left;
width:200px;
}
</style>

		
		
		
<h3><font color="green"><center>Suivi de litige</center></font></h3>
<article style="background-image:url(.jpeg); background-size:100px 100%; border:1px solid grey; padding:5px">

<p>


<p>
<form method="POST" action=" suivi_de_payement.php" class="form-inline">
      <label>Suivi Litige Appoint :</label>

       <select name ="classe" class="form-control">

                
                    <?php
                        $r=$bdd->query("SELECT distinct nomclasse FROM  classe");
                        while($user=$r->fetch())
                        echo'<option>'.$user['nomclasse'].'</option>';
                     ?>
       </select>
           

        
       <input type="submit" class="btn btn-info" value="Afficher" class="btn btn-info"></td>

</form>

</p>

</div>
</article>

<?php include('footer.php');  ?>
 

