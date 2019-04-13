<?php

session_start();

require '../database/database.php';
include '../views/form/form-handlerJoin.php';

if (!empty($_POST)) {

    // Get party
    $statement = $bdd->prepare('SELECT * FROM parties WHERE id = :id');
    $statement->bindParam(':id', $_POST['id']);
    $statement->execute();

    $party = $statement->fetch(PDO::FETCH_ASSOC);
    
    // Test password
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (password_verify($_POST['password'], $party['password'])) {

        // Test if user exist
        $statement = $bdd->prepare('SELECT * FROM users WHERE id_party = :id_party AND login = :login');
        $statement->bindParam(':id_party', $party['id']);
        $statement->bindParam(':login', $_POST['login']);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {

            $_SESSION['user_id'] = $user['id'];

        }
        else {

            // Create user
            $sql = "INSERT INTO users (login, id_party) VALUES (:login, :id_party)";
            $statement = $bdd->prepare($sql);
        
            $statement->bindParam(':login', $_POST['login']);
            $statement->bindParam(':id_party', $party['id']);
        
            $statement->execute();

            $_SESSION['user_id'] = $bdd->lastInsertId();
        }
        $_SESSION['party_id'] = $party['id'];
        $_SESSION['party'] = $party['name'];
        header('Location:'.URL.'link');
        exit;
    }

}

?>

<?php include '../views/partials/head.php'; ?>

    <a href="<?= URL ?>"><img class="logo" src="<?= URL ?>assets/images/logo.svg" alt="logo"></a>

    <img class="illustration" src="<?= URL ?>assets/images/illustration.svg" alt="illustrations">

    <form action="#" method="post">

        <h1>Rejoins tes amis :</h1>

        <span class="id">Id</span>
        <input type="id" name="id" placeholder="Id de la soirée">
        
        <span class="password">Mot de passe</span>
        <input type="password" name="password" placeholder="Mot de passe de la soirée">
        
        <span class="pseudo">Pseudo</span>
        <input type="text" name="login" maxlength="14" placeholder="Pseudo" >
        
        <?php foreach($messages['error'] as $_message): ?>
            <div class="message error">
                <?= $_message ?>
            </div>
        <?php endforeach; ?>
            
        <input class="Btn" type="submit" value="Connexion">

    </form>
<?php include '../views/partials/footer.php';
