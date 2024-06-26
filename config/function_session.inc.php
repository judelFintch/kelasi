<?php
include_once 'connexion.php';
 function sec_session_start() {
    $session_name = 'sec_session_id';   // Attribue un nom de session
    $secure = SECURE;
    // Cette variable empêche Javascript d’accéder à l’id de session
    $httponly = true;
    // Force la session à n’utiliser que les cookies
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Récupère les paramètres actuels de cookies
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Donne à la session le nom configuré plus haut
    session_name($session_name);
    session_start();            // Démarre la session PHP 
    session_regenerate_id();    // Génère une nouvelle session et efface la précédente
}
function login($login_user, $password, $bdd) {
    // L’utilisation de déclarations empêche les injections SQL
    if ($stmt = $bdd->prepare("SELECT id, login, password, salt FROM user  WHERE login = ? LIMIT 1")) {
        $stmt->bind_param('s', $login_user);  // Lie "$email" aux paramètres.
        $stmt->execute();    // Exécute la déclaration.
        $stmt->store_result();
         // Récupère les variables dans le résultat
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
         // Hashe le mot de passe avec le salt unique
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // Si l’utilisateur existe, le script vérifie qu’il n’est pas verrouillé
            // à cause d’essais de connexion trop répétés 
             if (checkbrute($user_id, $mysqli) == true) {
                // Le compte est verrouillé 
                // Envoie un email à l’utilisateur l’informant que son compte est verrouillé
                return false;
            } else {
                // Vérifie si les deux mots de passe sont les mêmes
                // Le mot de passe que l’utilisateur a donné.
                if ($db_password == $password) {
                    // Le mot de passe est correct!
                    // Récupère la chaîne user-agent de l’utilisateur
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // Protection XSS car nous pourrions conserver cette valeur
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // Protection XSS car nous pourrions conserver cette valeur
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Ouverture de session réussie.
                    return true;
                } else {
                    // Le mot de passe n’est pas correct
                    // Nous enregistrons cet essai dans la base de données
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // L’utilisateur n’existe pas.
            return false;
        }
    }
}


  /*function securisation_variable($variable){
    $variable=htmlspecialchars($variable);
    return $variable;
  }
   function Authenfication($login,$passwd){
        global $bdd;    
        //requette  
        $requete=$bdd->query("SELECT * FROM user") or die(print_r($bd));
        $resultat=$requete->fetch();
        if($resultat == 0){
            echo '<div class="alert alert-danger" id="cont" ><h3><center>Authenfication echouée!</h3></center></p><br /><br />';
         }
         elseif($resultat['login'] == $login AND $resultat['motp'] == $passwd ){
            switch ($resultat['level']) {
                case 1 or 2 or 3 or 4 or 5 or  6:
                $_SESSION['login'] = $resultat['login'];
                $_SESSION['level']=$resultat['level'];
                $_SESSION['user'] = $resultat['nomuser'];
              //  header('Location:ecole/accueil.php');
                break;
                case 8:     
                $_SESSION['login'] = $resultat['login'];
                $_SESSION['user'] = $resultat['nomuser'];
                $_SESSION['aleatoire']=rand(1,9).$_SESSION['user'];
               // header('Location:super_user/vue/acceuil.php');
                break;
                default:
                    # code...
                    break;
            }
         }
         else{
            echo '<div class="bg-danger">Authenfication echouée</div>';
         }
}*/
?>