<?php
session_start();
require_once "./inc/header.php";
if (!isset($_SESSION["user"])) {
    header("Location: connection.php");
} else { ?>
        <div class="container">
            <div>
                <h1>Bienvenue sur le site de la bibliotheque</h1>
            </div>
            <div>
                <button><a href="<?= $_SERVER['DOCUMENT_ROOT']; ?>/connection.php">Connection</a></button>
                <button><a href="http://localhost/bibliophp/register.php">Inscription</a></button>
            </div>
        </div>

<?php } ?>

<?php
require_once "$_SERVER[DOCUMENT_ROOT]/footer.php";
?>