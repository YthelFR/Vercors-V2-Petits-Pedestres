<?php

use src\Repositories\UserRepository;

if (isset($_SESSION['user'])) {

    $userRepository = new UserRepository();
    $user = $userRepository->getUserById($_SESSION['user']);

    $role = $user->getISADMIN() ? 'admin' : 'connected';

    $_SESSION['role'] = $role;
} else {
    $role = 'guest';
}

$_SESSION['role'] = $role;
if ((!isset($_SESSION['connecté']) && empty($_SESSION['user']))) {
    if ($_SESSION['role'] == 'admin') { ?>
        <div class="navigation">
            <h2>Bonjour, <?php echo $user->getPRENOMUSER(); ?></h2>
            <a href="./../src/Includes/TableauDeBord.php">Mes reservations</a>
            <a href="./public/index.php">Réserver</a>
            <a href="">Parametres</a>
        </div>
    <?php  } else if ($_SESSION['role'] == 'connected') { ?>
        <div class="navigation">
            <h2>Bonjour, <?php echo $user->getPRENOMUSER(); ?> </h2>
            <a href="./../src/Includes/TableauDeBord.php">Mes reservations</a>
            <a href="./public/index.php">Réserver</a>
            <a href="">Parametres</a>
        </div>
    <?php } else { ?>
        <div class="navigation">
            <a href="./../../public/index.php">Réserver</a>
        </div>
<?php }
}
?>