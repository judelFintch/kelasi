<?php

function Authenfication($login, $passwd) {
    global $bdd;	
    
    // Use prepared statements to prevent SQL injection
    $stmt = $bdd->prepare("SELECT * FROM user WHERE login = :login");
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $resultat = $stmt->fetch();

    // Check if user exists and password matches (assuming passwords are hashed)
    if ($resultat && password_verify($passwd, $resultat['motp'])) {
        $_SESSION['login'] = $resultat['login'];
        $_SESSION['user'] = $resultat['nomuser'];
        $_SESSION['level'] = $resultat['level'];
        
        switch ($resultat['level']) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                header('Location: ecole/accueil.php');
                break;
            case 8:
                $_SESSION['aleatoire'] = rand(1, 9) . $_SESSION['user'];
                header('Location: super_user/vue/acceuil.php');
                break;
            default:
                echo '<div class="alert alert-danger">Niveau d\'accès inconnu</div>';
                break;
        }
    } else {
        #ajoute de session error or success
    }
}
