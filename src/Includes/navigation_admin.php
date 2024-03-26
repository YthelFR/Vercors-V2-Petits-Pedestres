<?php
session_start();
require './../src/config.php';
require './../src/class/User.php';
require './../src/class/Database.php';

if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])) {
    // abort
    header('location: connexion.php');
    die;
}
$user = unserialize($_SESSION['user']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Panneau d'administration</title>
</head>

<body>
    <?php readfile('./header.php'); ?>

    <div id="main">
        <?php readfile('./navigation.php'); ?>
        <div class="listUsers">
            <h2>Liste des utilisateurs</h2><br>
            <?php

            $database_utilisateurs = new Database();
            $utilisateurs = $database_utilisateurs->ToutLesUtilisateurs();

            if (!empty($utilisateurs)) {
                foreach ($utilisateurs as $utilisateur) { ?>
                    <div class="utilisateur">
                        <tr>
                            <td style="font-weight: bold;">ID Utilisateur : <?php echo $utilisateur->getId(); ?></td><br>
                            <td style="font-weight: bold;">Nom : <?php echo $utilisateur->getNom(); ?></td><br>
                            <td style="font-weight: bold;">Prénom : <?php echo $utilisateur->getPrenom(); ?></td><br>
                            <td style="font-weight: bold;">Mail : <?php echo $utilisateur->getMail(); ?></td><br>
                            <td><button class="boutonDelete" onclick="location.href='./suppression?suppression=<?= $utilisateur->getId() ?>'">Supprimer</button></td>
                        </tr>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</body>