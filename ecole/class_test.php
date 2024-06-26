<?php

require_once('../bdd_app_gst_connect/allscirpt.inc.php');
if(isset($_POST['promotion_new'])and isset($_POST['promotion_ancienne'])){
	$promotion_ancienne=$_POST['promotion_ancienne'];
	$promotion_new=$_POST['promotion_new'];
	$selecetion_niveau_old_classe=$bdd->query("SELECT  niveau FROM classe WHERE nomclasse IN('$promotion_ancienne') ");
	$niveau=$selecetion_niveau_old_classe->fetch();
	$niveau_old=$niveau['niveau'];
	$selecetion_niveau_new_classe=$bdd->query("SELECT  niveau FROM classe WHERE nomclasse IN('$promotion_new') ");
	$niveau_new=$selecetion_niveau_new_classe->fetch();
	$niveau_new=$niveau_new['niveau'];
    $intervalle_entree_classe=$niveau_new-$niveau_old;

if($intervalle_entree_classe==1 or $intervalle_entree_classe==0){


	

	if($intervalle_entree_classe==0){

	echo '2';


	}

   if($intervalle_entree_classe==1){
		echo '1';

	}

	


}



else{

	echo '5';
}



}


