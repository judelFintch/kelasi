<?php 
	session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:../index.php");}
?>
<?php
     if(isset($_GET['delete']) and !empty($_GET['delete'])){
           	$delete=$bdd->query("DELETE FROM tempons");
           	header('location:accueil.php');
           }


?>