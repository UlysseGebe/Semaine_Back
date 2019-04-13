<?php session_start() ?>
<?php include '../views/partials/head.php'; ?>
<a href="<?= URL ?>"><img class="logo" src="<?= URL ?>assets/images/logo.svg" alt="logo"></a>
<div class="container">
    <img class="illustration" src="<?= URL ?>assets/images/illustration.svg" alt="illustration" />
    <h2>Bravo ta soirée vient d’être créée !</h2>
    <h2 class='give'>Ton Id de soirée: <?php echo $_SESSION['party_id'];?></h2></h2>
    <div class="btnwrap">
        <div class="btn1"><a href="<?php URL ?>dashboard/Nourriture">Poursuivre</a></div>
        <div class="btn2"><a href="#">Invite tes amis</a></div>
    </div>
</div>
<?php include '../views/partials/footer.php';