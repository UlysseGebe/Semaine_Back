<?php

$messages = [
    'error' => [],
];

if (!empty($_POST)) {

    // if (!password_verify($_POST['password'], $party['password'])) {

        $messages['error'][] = 'Informations non valides';

    // }
}
