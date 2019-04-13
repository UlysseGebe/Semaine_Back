<?php
    require '../database/database.php';
    session_start ();
    if (is_null($_SESSION['party'])) {
        // On teste pour voir si nos variables ont bien été enregistrées
        echo 'Les variables ne sont pas déclarées.';
        // On démarre la session
        // On détruit les variables de notre session
        session_unset ();
        // On détruit notre session
        session_destroy ();
        // On redirige le visiteur vers la page d'accueil
        header ('location:'.URL);
    }
?>
<?php include '../views/partials/head.php'; ?>
<header>
    <?php include '../views/partials/header.php'; ?>
</header>
<div class="navMenu">
    <ul>
        <li class="Nourriture" onclick="location.href='<?= URL ?>dashboard/Nourriture'">Nourriture</li>
        <li class="Boissons" onclick="location.href='<?= URL ?>dashboard/Boissons'">Boissons</li>
        <li class="Musiques" onclick="location.href='<?= URL ?>dashboard/Musique'">Musiques</li>
        <li class="Materiels active" onclick="location.href='<?= URL ?>dashboard/Materiels'">Matériels</li>
        <li class="Depenses" onclick="location.href='<?= URL ?>dashboard/Depenses'">Dépenses</li>
    </ul>
</div>
<div class="layers">
    <?php include '../views/templates/Materiels.php'; ?>
</div>


<div class="button"></div>

<?php include '../views/partials/footer.php';