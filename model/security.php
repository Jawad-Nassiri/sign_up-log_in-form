<?php
// erreurs ici 
session_start();
include_once "../inc/db_connection.php";

if (isset($_POST["connexion"])) {
    unset($_SESSION['error']);

    extract($_POST);

    // Se connecter à la base de données : 
    $db = dBConnexion();
    

    // Préparation de la requête vers la base de données : 
    $request = $db->prepare("SELECT * FROM membres WHERE email = ?");

    try {
        $request->execute([$email]);
        $user = $request->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo $error->getMessage();
    }

    // On vérifie qu'un résultat a bien été récupéré
    if (empty($user)) {
        $_SESSION["error"] = "Identifiant incorrect.";
        header('Location: ../connection.php');
    } else {
        if (password_verify($password, $user["mdp"])) {
            $_SESSION["welcome"] = " Bienvenue" . " " . $user["firstname"];

            $_SESSION['membre'] = $user;
            header("Location: http://localhost/boutique/userinterface.php");
        } else {
            $_SESSION["error"] = "Mot de passe incorrect";
            header('Location: ../connection.php');
        }
    }
}
