<?php session_start();
if (!isset($_SESSION["membre"])) {
    header("Location: http://localhost/bibliotheque/connection.php");
}
?>

<?php include_once "./inc/header.php"; ?>

<div class="<?= $_SESSION['membre']['genre'] == 'm' ? 'bleu' : 'rose'; ?>">
    <h1>Felicitation <?= $_SESSION['membre']['prenom']; ?></h1>
    <p class="alert alert-success">Tu as trouvé toutes les erreurs</p>
</div>