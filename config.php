<?php
// Informations d'identification
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=geekzone;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>
