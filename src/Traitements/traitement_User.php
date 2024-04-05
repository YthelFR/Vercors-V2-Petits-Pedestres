<?php

namespace src\Traitements;

use DateTime;
use src\Models\User;
use src\Repositories\UserRepository;

require './../../config.php';
require './../../erreurs.php';
require_once './../autoload.php';


if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['adressePostale']) && !empty(($_POST['telephone'])) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['adressePostale']) && isset(($_POST['telephone']))) {
    $NOM_USER = htmlentities($_POST['nom']);
    $PRENOM_USER = htmlentities($_POST['prenom']);
    $ADRESSE_USER = htmlentities($_POST['adressePostale']);
    $IS_ADMIN = '0';
    $DATE_RGPD = new DateTime;
    $DATE_RGPD = $DATE_RGPD->format('Y-m-d-H-i-s');
    $PASSWORD_USER = htmlentities($_POST['password']);
    $EMAIL_USER = htmlentities($_POST['mail']);
    $TELEPHONE_USER = htmlentities($_POST['telephone']);

    if ($_POST['password'] === $_POST['password2']) {
        if (strlen($_POST['password']) >= 8) {
            $PASSWORD_USER = password_hash($PASSWORD_USER, PASSWORD_DEFAULT);
        } else {
            header('location: /../public/index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
            exit;
        }
    } else {
        header('location: /../public/index.php?erreur=' . PASSWORD_PAS_IDENTIQUE);
        exit;
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $Mail = htmlentities($_POST['mail']);
    } else {
        header('location: ../Includes/signIn.php?email=' . ERREUR_EMAIL);
        exit;
    }
    // action finale
    $repository = new UserRepository();
    $User = new User(['NOM_USER' => $NOM_USER, 'PRENOM_USER' => $PRENOM_USER, 'ADRESSE_USER' => $ADRESSE_USER, 'IS_ADMIN' => $IS_ADMIN, 'DATE_RGPD' => $DATE_RGPD, 'PASSWORD_USER' => $PASSWORD_USER, 'EMAIL_USER' => $EMAIL_USER, 'TELEPHONE_USER' => $TELEPHONE_USER]);

    if (($repository->registerUser($User)) == true) {
        header('location: ../Includes/connexion.php');
        die;
    } else {
        header('location: ../Includes/signIn.php?message=' . ERREUR_ENREGISTREMENT);
        die;
    }
} else {
    header('location: ../Includes/signIn.php?message=' . ERREUR_CHAMP_VIDE);
}
