<?php
require __DIR__ . "/../src/init.php";
require './../src/Models/User.php';
require './../src/Models/Database.php';
require './../src/Repositories/ReservationRepository.php';
$Messages_Erreurs = null;

if (isset($_GET['erreur'])) {
    $Messages_Erreurs = (int) $_GET['erreur'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script type="module" src="./assets/js/script.js" defer></script>
    <title>Formulaire de réservation Music Vercos Festival</title>
</head>

<body>


    <?php include_once __DIR__ . "/../src/Includes/header.php"; ?>
    <div id="main">
        <?php include_once __DIR__ . "../../src/Includes/navigation.php"; ?>
        <?php include_once __DIR__ . "/../src/Includes/reservation.php" ?>

    </div>


</body>

</html>