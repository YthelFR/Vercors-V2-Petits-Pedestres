<?php
namespace src\Includes;
use src\Repositories\UserRepository;

if (isset($_SESSION['user'])) {
    
    $userRepository = new UserRepository();
    $user = $userRepository->getUserById($_SESSION['user']);

    // Vérifier si $user est une instance de User avant d'appeler getISADMIN()
    if ($user instanceof User) {
        $role = $user->getISADMIN() ? 'admin' : 'connected';
    } else {
        // Gestion du cas où $user est false (utilisateur non trouvé)
        $role = 'guest'; // Ou toute autre valeur par défaut appropriée
    }

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