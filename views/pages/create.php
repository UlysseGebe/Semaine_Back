<?php

session_start();

require '../database/database.php';
include '../views/form/form-handlerCreate.php';

if (!empty($_POST)) {
    
    if (!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password-conf']) && !empty($_POST['phone']) && !empty($_POST['time']) && !empty($_POST['address'])) {
        if ($_POST['password'] == $_POST['password-conf']) {
            
            // Create party
            $sql = "INSERT INTO parties (name, password, time, description, address, phone) VALUES (:name, :password, :time, :description, :address, :phone)";
            
            $statement = $bdd->prepare($sql);
            
            $statement->bindParam(':name', $_POST['name']);
            $statement->bindParam(':time', $_POST['time']);
            $statement->bindParam(':description', $_POST['description']);
            $statement->bindParam(':address', $_POST['address']);
            $statement->bindParam(':phone', $_POST['phone']);
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $statement->bindParam(':password', $hash);
            
            $statement->execute();
            
            $partyId = $bdd->lastInsertId();
            
            // Create user
            $sql = "INSERT INTO users (login, id_party) VALUES (:login, :id_party)";
            $statement = $bdd->prepare($sql);
            
            $statement->bindParam(':login', $_POST['login']);
            $statement->bindParam(':id_party', $partyId);
            
            $statement->execute();
            
            $_SESSION['user_id'] = $bdd->lastInsertId();
            $_SESSION['party'] = $_POST['name'];
            $_SESSION['party_id'] = $partyId;

            header('Location:'.URL.'confirmation');
        }
    }
}
?>

<?php include '../views/partials/head.php'; ?>

<a href="<?= URL ?>"><img class="logo" src="<?= URL ?>assets/images/logo.svg" alt="logo"></a>
<img class="illustration" src="<?= URL ?>assets/images/information.svg" alt="illustrations">

<div class="form">
    <h1>Informations</h1>
    <form action="#" method="post">
        <span class="title">Titre</span>
        <input type="text" name="name" placeholder="Ma super soirée">
        <span class="pseudo">Pseudo</span>
        <input type="text" name="login" maxlength="14" placeholder="Mon pseudo">
        <span class="password">Mot de passe</span>
        <input type="password" name="password" placeholder="Mot de passe de la party">
        <span class="password-conf">Confirmer mot de passe</span>
        <input type="password" name="password-conf" placeholder="Confirmez le mot de passe">
        <span class="tel">Téléphone</span>
        <input type="tel" name="phone" placeholder="+33…">
        <span class="date">Date</span>
        <input type="date" name="time">
        <span class="adresse">Adresse</span>
        <input type="text" name="address" placeholder="27 rue du Progrès, Montreuil 93100">
        <span class="description">Messages</span>
        <input type="textarea" name="description" placeholder="Information complémentaires">
        <input class="Btn" type="submit" value="Create">
    </form>

    <?php foreach($messages['error'] as $_message): ?>
    <div class="message error">
        <?= $_message ?>
    </div>
    <?php endforeach; ?>
</div>

<?php include '../views/partials/footer.php';
