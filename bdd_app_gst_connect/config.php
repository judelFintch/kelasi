<?php
/**
 * Voici les détails de connexion à la base de données
 */  
// Allow overriding configuration via environment variables for flexibility
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_NAME') ?: 'gestecole';

define("HOST", $host);       // L’hébergeur où vous voulez vous connecter.
define("USER", $user);       // Le nom d’utilisateur de la base de données.
define("PASSWORD", $password); // Le mot de passe de la base de données.
define("DATABASE", $database); // Le nom de la base de données.
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
define("SECURE", FALSE);    
