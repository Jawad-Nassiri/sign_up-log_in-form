<?php

// Erreur ici
function dBConnexion()
{
    $connexionDB = null; // Variable qui doit stocker notre instance de connexion à la base de données
    $identify = "root";
    $password = "";
    $host = "localhost";
    $dbName = "bibliotheque";

    try { // Essaye de se connecter à la base de données
        $connexionDB = new PDO("mysql:host=$host;dbname=$dbName", "$identify", "$password"); // On récupère l'objet de connexion à la base de données dans la variable $connexionDB
    } catch (PDOException $error) { // Si la connexion echoue
        $connexionDB = $error; // On récupère notre erreur dans $connexionDb

    }
    return $connexionDB; // Retourne l'objet PDO (avec ou sans erreur)
}
