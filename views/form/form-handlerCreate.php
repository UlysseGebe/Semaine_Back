<?php

$messages = [
    'error' => [],
];

if (!empty($_POST)) {

    if (empty($_POST['name']) && empty($_POST['login']) && empty($_POST['password']) && empty($_POST['password-conf']) && empty($_POST['phone']) && empty($_POST['time']) && empty($_POST['address'])) {

        $messages['error'][] = 'Remplissez les champs manquants';

    }

    if ($_POST['password'] !== $_POST['password-conf']) {

        $messages['error'][] = 'Les mots de passes ne correspondent pas';

    }
}