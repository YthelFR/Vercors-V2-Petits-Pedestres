<?php
session_start();
require './src/config.php';
require './src/class/User.php';
require './src/class/Database_reservation.php';
require './src/class/Reservation.php';

$Messages_Erreurs = null;
if (isset($_GET['erreur'])) {
    $Messages_Erreurs = (int) $_GET['erreur'];
}

if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])) {
    // abort
    header('location: ./connexion.php');
    die;
}
$user = unserialize($_SESSION['user']);
$email = $user->getMail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Tableau de bord</title>
</head>

<body>
    <?php include './assets/header_user.php'; ?>

    <div id="main">
        <?php include './assets/navigation_user.php'; ?>
        <div class="affichage_reservation">
            <h2>Récapitulatif de votre commande</h2>
            <?php
            $database_reservation = new Database_reservation();
            $database_reservation_utilisateur = $database_reservation->Toute_Les_Reservations();
            if (!empty($database_reservation_utilisateur)) {
                foreach ($database_reservation_utilisateur as $user_resa) {
                    if ($user_resa->getEmail() == $email) { ?>
                        <p>Le tarif de votre commande est de <?php echo $user_resa->getTarif(); ?>€</p>
                        <p>Vous avez commander <?php echo $user_resa->getNombrePlaces(); ?> place(s)</p>
                        <p>Vous avez reserver <?php echo $user_resa->getNombreLugesEte(); ?> luge(s)</p>
                        <p>Vous avez reserver <?php echo $user_resa->getNombreCasquesEnfants(); ?> casques pour enfants</p>
                        <input type="button" value="Supprimer ma reservation">
                <?php
                    }
                }
            } else { ?>
                <p>Vous n'avez pas encore de réservation</p>
            <?php } ?>

        </div>
    </div>
</body>

</html>