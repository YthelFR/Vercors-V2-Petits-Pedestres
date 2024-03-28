<?php
$_SESSION['role'] = $role;
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') { ?>
        <div class="navigation">
            <h2>Bonjour, ' . $user->getPrenom() . '</h2>
            <a href="./../src/Includes/TableauDeBord.php">Mes reservations</a>
            <a href="./public/index.php">Réserver</a>
            <a href="">Parametres</a>
        </div>
    <?php  } else if ($_SESSION['role'] == 'connected') { ?>
        <div class="navigation">
            <h2>Bonjour, <?php echo $user->getPrenom(); ?> </h2>
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