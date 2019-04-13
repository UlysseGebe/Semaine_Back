<?php session_start(); ?>
<?php include '../views/partials/head.php'; ?>
<div class="container">
    <a href="<?= URL ?>"><img class="logo" src="<?= URL ?>assets/images/logo.svg" alt="logo"></a>
    <img class="illustration" src="<?= URL ?>assets/images/illustration.svg" alt="illustrations">
    <h1>Rejoint tes amis :</h1>
    <input onClick="window.location.href='<?php URL ?>dashboard/Nourriture'" class="Btn" type="submit" value="Poursuivre">
</div>
<?php include '../views/partials/footer.php';