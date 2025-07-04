<?php
require_once('../../bdd_app_gst_connect/allscirpt.inc.php');
    function  insertionNewFraisUsd($section,$devise,$prix,$libelle,$classer,$toutes,$compte,$annacad_art){
    	global $bdd;
        global $annacad;
        $insertion_frais=$bdd->query("INSERT INTO unique_frais VALUES('',
        	                                                    '$libelle',
        	                                                    '$prix',
        	                                                     0,
        	                                                    '$section',
        	                                                    '$annacad',

        	                                                    '$devise','$classer','$compte','$annacad_art')")
        or die(print_r($bdd->errorInfo()));
        return true;
    }
     function  insertionNewFraisCdf($section,$devise,$prix,$libelle,$classer,$toutes,$compte,$annacad_art){
    	global $bdd;
        global $annacad;
        $insertion_frais=$bdd->query("INSERT INTO unique_frais VALUES('',
        	                                                    '$libelle',
        	                                                    '0',
        	                                                    '$prix',
        	                                                    '$section',
        	                                                    '$annacad',
        	                                                    '$devise','$classer','$compte','$annacad_art')")
        or die(print_r($bdd->errorInfo()));
        return true;
    }
    if(isset($_POST['secure_link']) && $_POST['secure_link']==true){
       extract($_POST);
    	  if(!empty($section)&&!empty($libelle)&&!empty($devise)&&!empty($prix)){
    	  	//verification de la devise
    	  	  if($devise=='USD'){
                        $section = htmlspecialchars($section);
                        $libelle = filter_var(
                            $libelle,
                            FILTER_SANITIZE_FULL_SPECIAL_CHARS
                        );
    	        insertionNewFraisUsd($section,$devise,$prix,$libelle,$classer,$specification,$compte,$annacad_art);
    	  	  	echo 1;
    	  	  }
    	  	   if($devise=='CDF'){
                        $section = htmlspecialchars($section);
                        $libelle = filter_var(
                            $libelle,
                            FILTER_SANITIZE_FULL_SPECIAL_CHARS
                        );
    	        insertionNewFraisCdf($section,$devise,$prix,$libelle,$classer,$specification,$compte,$annacad_art);
    	  	  	echo 1;
    	  	}
    	  }
    }







