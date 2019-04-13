<?php
session_start();
require '../database/database.php';
if(isset($_GET['idprod']) AND !empty($_GET['idprod'])) {
    $suppr_id = htmlspecialchars($_GET['idprod']);
    $suppr = $bdd->prepare('DELETE FROM produit WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location:'.URL.'dashboard/Nourriture');
}
else if(isset($_GET['idprodb']) AND !empty($_GET['idprodb'])) {
    $suppr_id = htmlspecialchars($_GET['idprodb']);
    $suppr = $bdd->prepare('DELETE FROM boisson WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location:'.URL.'dashboard/Boissons');
}
else if(isset($_GET['idtrack']) AND !empty($_GET['idtrack'])) {
    $suppr_id = htmlspecialchars($_GET['idtrack']);
    $suppr = $bdd->prepare('DELETE FROM musique WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location:'.URL.'dashboard/Musique');
}
else {
    header('Location:'.URL.'404');
}