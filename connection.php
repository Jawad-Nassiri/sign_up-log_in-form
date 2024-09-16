<?php
session_start();
require_once './inc/header.php';

?>
<form class="formConnection" action="./model/security.php" method="post">
    <h2>Page de connection</h2>

    <?php if (!empty($_SESSION["error"])) { ?>
        <p>
            <?= $_SESSION["error"]; ?>
        </p>
    <?php } ?>
    <div>
        <label for="email">Email : </label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <input type="submit" value="connexion" name="connexion">
    </div>

</form>

<?php require_once "inc/footer.php" ?>