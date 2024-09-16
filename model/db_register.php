password<?php 
require_once '../inc/db_connection.php';
// erreurs ici
session_start();

// aide : erreur avec $_SESSION dans le traitement


if (isset($_POST["inscription"])) {
    extract($_POST);
    $_SESSION['erreur_champ'] = '';
    if (empty($genre) || empty($lastName) || empty($firstName) || empty($email) || empty($country) || empty($password) || empty($confirm) || empty($phone)) {
        $_SESSION['erreur_champ'] .= '<p> Merci de remplir tous les champs demandés </p>';
    

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erreur_champ'] .= '<p> L\'email est invalide </p>';
    }

    if (!preg_match('/^(\+33|0)[1-9](\d{2}){4}$/', $phone)) {
        $_SESSION['erreur_champ'] .= '<p> Le numero de telephone est invalide </p>';
    }

    if (strcmp($password, $confirm) < 0 || strcmp($password, $confirm) > 0) {
        $_SESSION['erreur_champ'] .= '<p> Les mots de passe ne correspondent pas </p>';
    }

    if (!isset($conditions)) {
        $_SESSION['erreur_champ'] .= '<p> Conditions obligatoires </p>';
    }


    if (!empty($_SESSION['erreur_champ'])) {
        header('Location: ../register.php');
    } else {
        $connexionDB = dBConnexion();
        $mdpCryptage = password_hash($password, PASSWORD_DEFAULT);


        // Préparation requête : 
        $request = $connexionDB->prepare("INSERT INTO membres (genre,nom,prenom,email,pays,mdp,telephone) VALUES (?,?,?,?,?,?,?)");
        
        try {
            $request->execute(array($genre, $lastName, $firstName, $email, $country, $mdpCryptage, $phone));
            header("Location:  http://localhost/boutique/connection.php");
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
