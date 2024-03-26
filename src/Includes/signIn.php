<?php
session_start();
if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
    // abort
    header('location:TableauDeBord.php');
    die;
}
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
    <title>Inscription Newsletter</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>

<body>
    <?php include './assets/header.php'; ?>
    <div id="main">
        <?php include './assets/navigation.php'; ?>

        <form action="/src/traitement_User.php" method="post" onsubmit="return Validation()">
            <fieldset class="fieldsetInscription">
                <h2>Formulaire d'inscription</h1>

                    <div><label for="nom">Nom :</label>
                        <input class="width" type="text" id="nom" name="nom" required>
                    </div>

                    <div><label for="prenom">Prénom :</label>
                        <input class="width" type="text" id="prenom" name="prenom" required>
                    </div>

                    <div><label for="mail">Mail :</label>
                        <input class="width" type="email" id="mail" name="mail" required>
                    </div>
                    <?php
                    if ($Messages_Erreurs === 1) {
                    ?><p class='error'>Le mail n'est pas valide."</p>
                    <?php } ?>

                    <div><label for="password">Mot de passe :</label>
                        <input class="width" type="password" id="password" name="password" required>
                    </div>
                    <div><label for="password2">Vérifier le Mot de passe :</label>
                        <input class="width" type="password" id="password2" name="password2" required>
                    </div>
                    <?php if ($Messages_Erreurs === 3) { ?>
                        <p class='message error'>Les deux mots de passe doivent être identique.</p>
                    <?php } ?>
                    <?php if ($Messages_Erreurs === 4) { ?>
                        <p class='message error'>Le mot de passe doit avoir au moins 8 caractères.</p>
                    <?php } ?>
                    <?php if ($Messages_Erreurs === 2) { ?>
                        <p class='message error'>Tout les champs doivent être remplis.</p>
                    <?php } ?>
                    <input class="bouton" type="submit" name="submit" value="S'inscrire">
            </fieldset>
        </form>
    </div>
</body>

</html>