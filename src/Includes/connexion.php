<?php
session_start();

$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../public/assets/css/style.css">
    <title>Connexion</title>
</head>

<body>
    <?php include_once "./header.php"; ?>
    <div id="main">
        <?php include_once "./navigation.php"; ?>
        <form action="../Traitements/authentication.php" method="POST" >
            <fieldset class="fieldsetConnexion">
                <h2>Connexion</h1>
                    <div><label for="email">Mail :</label>
                        <input class="width" type="email" id="email" name="email" required>
                    </div>
                    <?php
                    if ($code_erreur === 7) {
                    ?><p class='error'>Erreur d'identification</p>
                    <?php } ?>

                    <div><label for="password">Mot de passe :</label>
                        <input class="width" type="password" id="password" name="password" required>
                        <input class="bouton" type="submit" name="submit" value="Se connecter">
                    </div>
            </fieldset>
        </form>
    </div>

</body>

</html>