<?php
ob_start();
function Authentication($login, $passwd) {
    global $bdd;
    // Démarrer la session si elle n'est pas déjà démarrée
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    try {
        // Utilisation d'une requête préparée pour éviter les injections SQL
        $stmt = $bdd->prepare("SELECT * FROM user WHERE login = :login");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            // Utilisateur trouvé, vérifiez le mot de passe
            if (password_verify($passwd, $resultat['motp'])) {
                $_SESSION['login'] = $resultat['login'];
                $_SESSION['user'] = $resultat['nomuser'];
                $_SESSION['level'] = $resultat['level'];

                switch ($resultat['level']) {
                    case 1:
                         header('Location:dashboard.php');
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                       
                        exit();
                    case 8:
                        $_SESSION['aleatoire'] = rand(1, 9) . $_SESSION['user'];
                        header('Location: super_user/vue/acceuil.php');
                        exit();
                    default:
                        $_SESSION['error'] = 'Niveau d\'accès inconnu';
                       //header('Location: login.php');
                        exit();
                }
            } else {
                // Mot de passe incorrect
                $_SESSION['error'] = 'Identifiant ou mot de passe incorrect';
                //header('Location: login.php');
                exit();
            }
        } else {
            // Aucun utilisateur trouvé avec ce login
            $_SESSION['error'] = 'Identifiant ou mot de passe incorrect';
            header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        // Gérer l'erreur de requête ici
        $_SESSION['error'] = "Erreur de requête : " . $e->getMessage();
        //header('Location: login.php');
        exit();
    }
}
?>
