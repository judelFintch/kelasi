<?php
   ob_start() ;
   session_start();
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 	 $user=$_SESSION['user'];
	 	  	 
	   	 	 }
	 else{header("Location:../index.php");
	}

	