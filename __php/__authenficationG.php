<?php
 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
   function Authenfication($login,$passwd){
        global $bdd;    
        //requette
        $requete = $bdd->prepare('SELECT * FROM user WHERE login = :login AND motp = :passwd');
        $requete->bindParam(':login', $login);
        $requete->bindParam(':passwd', $passwd);
        $requete->execute();
        $resultat = $requete->fetch();
        if($resultat == 0){
            echo '<div class="alert alert-danger" id="cont" ><h3><center>Authenfication echouée!</h3></center></p><br /><br />';
         }
         else{
            if($resultat['login'] == $login AND $resultat['motp'] == $passwd ){
              switch ($resultat['level']) {
                case 1 or 2 or 3 or 4 or 5 or  6:
                $_SESSION['login'] = $resultat['login'];
                $_SESSION['level']=$resultat['level'];
                $_SESSION['user'] = $resultat['nomuser'];
                header('Location:ecole/accueil.php');
                break;
                case 8:     
                $_SESSION['login'] = $resultat['login'];
                $_SESSION['user'] = $resultat['nomuser'];
                echo $_SESSION['aleatoire']=rand(1,9).$_SESSION['user'];
                header('Location:super_user/vue/acceuil.php');
                break;
                default:
                    # code...
                    break;
            }
         }
         else{
            echo '<div class="bg-danger">Authenfication echouée</div>';
         }
     }

    }
//verification de  l envois du formulaire
if(isset($_POST['login_user']) || isset($_POST['user_password'])){
        Authenfication($_POST['login_user'],$_POST['user_password']);
}

?>
