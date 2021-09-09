<?php ob_start(); include('header.php'); ?>
<body>
	 <div class="container">
       <div class="main">
         <div class="row">
              <div class="col-lg-8">
            <?php
             if(isset($_GET['id'])){$code_page=htmlentities($_GET['id']);}
             else{
                exit();
            }
            ?>
   <div class="alert alert-danger" role="alert">Saisisez Votre ID et PIN</div>             
  <?php  echo '  <form action="secure_d.php?id='.$code_page.'"   name="login" role="form" class="form-horizontal" method="post" >'?>
            <div class="form-group">
                 <div class="col-md-8">
                    <input name="id" autofocus="" placeholder="Idenfiant" class="form-control" type="text" />
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-md-8"><input name="pwd" value="" placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/>
                    </div>
                </div> 
                    <div class="form-group">
                    <div class="col-md-8">
                   <?php echo' <input type="hidden"  name="codep" value="'.$code_page.'"  id="UserPassword"/></div>';?>
                    </div>
                <div class="form-group">
                    <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Acceder"/>
                </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>
    <?php
    if(isset($_POST['codep']) and isset($_POST['id']) and isset($_POST['pwd'])){
    	$id=$_POST['id'];
    	$pwd=$_POST['pwd'];
        $codep=$_POST['codep'];
    	$selection_indentifiant=$bdd->query("SELECT * FROM secure_page WHERE numero_access in('$id') and pwd in('$pwd')");
    	if($selection_indentifiant->rowCount()==0){

    	}
    	else{

             $_SESSION['session_temporaire']=$id;

    		 switch ($codep) {
    			   case 1:
    			   header("location:operation_facture.php");
    			   break;
    			   case 2:
    			   header("location:creation_article.php");
    			   break;
    			   case 3:
    			   header("location:operation.php");
    			   break;
    			   case 4:
                   header("location:gestion_taux.php");
    			   break;                 
    			   case 5:
    			   header("location:rapport_finance.php");
    			   break;
             case 6:
             header("location:depense.php");
                   break;
                   case 7:
                   header("location:corbeille.php");
                   break;
                   case 8:
                   header("location:creation_frais_unique.php.php");
                   break;
                    case 9:
                   header("location:stock.php");
                   break;
                   case 10:
                   header("location:re_print.php");
                   break;      

        			   default:
    				break;
    		}
   	    }
    }
 include('footer.php'); ob_end_flush(); ?>