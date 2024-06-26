
<?php
function Authenfication($login, $passwd) {
    global $bdd; // Assurez-vous que $bdd est accessible globalement dans cette fonction
    
    try {
        // Utilisation d'une requête préparée pour éviter les injections SQL
        $stmt = $bdd->prepare("SELECT * FROM user WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $resultat = $stmt->fetch();
        var_dump($resultat);

        if ($resultat) {
            // Utilisateur trouvé, vérifiez le mot de passe
            if (password_verify($passwd, $resultat['motp'])) {
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
                        exit();
                        break;
                    case 8:
                        $_SESSION['aleatoire'] = rand(1, 9) . $_SESSION['user'];
                        header('Location: super_user/vue/acceuil.php');
                        exit();
                        break;
                    default:
                        $_SESSION['error'] = 'Niveau d\'accès inconnu';
                        header('Location: login.php');
                        exit();
                        break;
                }
            } else {
                // Mot de passe incorrect
                $_SESSION['error'] = 'Identifiant ou mot de passe incorrect';
                header('Location: login.php');
                exit();
            }
        } else {
            // Aucun utilisateur trouvé avec ce login
            $_SESSION['error'] = 'Identifiant ou mot de passe incorrect';
            //header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur de requête : " . $e->getMessage();
        // Gérer l'erreur de requête ici

        var_dump($e->getMessage());
    }
}
