<?php
include_once "./inc/header.php";
session_start();
if (isset($_SESSION['erreur_champ'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['erreur_champ'] . '</div>';
};
?>
<form class="formRegister" method="POST" action="./model/db_register.php" enctype="multipart/form-data">
    <h1>Page D'Inscription</h1>
    <div class="flex">
        <div class="formulaire">
            <div class="infos">
                <select name="genre" id="genre-select">
                    <option value="">--Sexe--</option>
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select>
                <input type="text" name="lastName" placeholder="Nom" required>
                <input type="text" name="firstName" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Votre email" required>
            </div>
            <div class="infos">
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="password" name="confirm" placeholder="Confirmez votre mot de passe" required>
                <input type="tel" name="phone" placeholder="n° telephone" required>
            </div>
        </div>
        <div class="messages">
            <label for="pays">Pays :</label>
            <select class="form-control" id="pays" name="country">
                <option value="france">France</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                <option value="autre">Autre</option>
            </select>
            <label for="conditions">accepter les conditions d'utilisations</label>
            <input type="checkbox" id="conditions" name="conditions">
            <?php if (!empty($_SESSION["errorConditions"])) { ?>
                <p>
                    <?= $_SESSION["errorConditions"]; ?>
                </p>
            <?php }
            unset($_SESSION["errorConditions"]); ?>
        </div>
        <div>
            <button type="submit" name="inscription">valider</button>
            <button type="button"><a href="index.php">retour</a></button>
        </div>
    </div>
</form>