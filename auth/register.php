<?php
session_start();
require_once __DIR__ . '/../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    // Check that all fields are filled
    if (!empty($login) && !empty($passwd) && !empty($username) && !empty($level)) {
        registerUser($login, $passwd, $username, $level);
    } else {
        echo '<div class="alert alert-danger">Please fill in all fields!</div>';
    }
}

function registerUser($login, $passwd, $username, $level) {
    global $bdd;
    
    // Hash the password before storing it
    $hashedPassword = password_hash($passwd, PASSWORD_DEFAULT);

    // Use a prepared statement to avoid SQL injection
    $stmt = $bdd->prepare("INSERT INTO user (login, motp, nomuser, level) VALUES (:login, :motp, :username, :level)");
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':motp', $hashedPassword);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':level', $level);

    if ($stmt->execute()) {
        header('Location: ../dashboard.php');
    } else {
        echo '<div class="alert alert-danger">Error during registration!</div>';
    }
}


