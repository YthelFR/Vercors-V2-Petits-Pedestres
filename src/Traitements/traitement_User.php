<?php

use src\Models\User;
use src\Repositories\UserRepository;

require '/../config.php';
require './erreurs.php';


if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password2']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $Nom = htmlentities($_POST['nom']);
    $Prenom = htmlentities($_POST['prenom']);

    if ($_POST['password'] === $_POST['password2']) {
        if (strlen($_POST['password']) >= 8) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            header('location: /../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
            exit;
        }
    } else {
        header('location: /../index.php?erreur=' . PASSWORD_PAS_IDENTIQUE);
        exit;
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $Mail = htmlentities($_POST['mail']);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }
    // action finale
    $repository = new UserRepository();
    $User = new User($NOM_USER, $PRENOM_USER, $ADRESSE_USER, $IS_ADMIN, $DATE_RGPD, $PASSWORD_USER, $EMAIL_USER, $TELEPHONE_USER);

    if (($repository->registerUser($User)) == true) {
        header('location: /../connexion.php');
        die;
    } else {
        header('location: /../index.php?message=' . ERREUR_ENREGISTREMENT);
        die;
    }
} else {
    header('location: /../index.php?message=' . ERREUR_CHAMP_VIDE);
}
