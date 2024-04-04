<?php

use src\Repositories\UserRepository;

session_start();
require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Repositories/UserRepository.php';
require_once __DIR__ . '/Models/Database.php';
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . "/../config.php";



# On instancie un object Database
$userByMail = new UserRepository();

if (!empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['email']) && isset($_POST['password'])) {

    # On fait appel à la fonction LogIn de l'object userByMail
    $email = htmlentities($_POST['email']);

    $userAvecCeMail = $userByMail->getUserByEmail($email);

    if (property_exists($userAvecCeMail, 'PASSWORD_USER') && password_verify($_POST['password'], $userAvecCeMail->PASSWORD_USER)) {
        $hashedPassword = hash('whirlpool', $_POST['password']);

        if (password_verify($_POST['password'], $userAvecCeMail->getPASSWORDUSER())) {
            $_SESSION['connecté'] = true;
            $_SESSION['user'] = serialize($userAvecCeMail);
            header('location: /Includes/TableauDeBord.php');
            exit;
        } else {
            header('location: /Includes/connexion.php?erreur=' . 7);
            die;
        }
    }
}
