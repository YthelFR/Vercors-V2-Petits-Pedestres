<?php
session_start();
$Messages_Erreurs = [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <script type="module" src="./assets/script.js" defer></script>
    <title>Formulaire de réservation Music Vercos Festival</title>
</head>

<body>

    <form action="./src/traitement_Reservation.php" id="inscription" method="POST">
        <fieldset id="reservation">
            <legend>Réservation</legend>
            <h3>Nombre de réservation(s) :</h3>
            <input type="number" name="nombrePlaces" id="NombrePlaces" required>
            <h3>Réservation(s) en tarif réduit</h3>
            <input type="checkbox" name="tarifReduit" id="tarifReduit">
            <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

            <h3>Choisissez votre formule :</h3>
            <input type="checkbox" name="passSelection" id="pass1jour">
            <label for="pass1jour">Pass 1 jour : 40€</label>

            <!-- Si case cochée, afficher le choix du jour -->
            <section id="pass1jourDate">
                <input type="checkbox" name="passSelection" id="choixJour1">
                <label for="choixJour1">Pass pour la journée du 01/07</label>
                <input type="checkbox" name="passSelection" id="choixJour2">
                <label for="choixJour2">Pass pour la journée du 02/07</label>
                <input type="checkbox" name="passSelection" id="choixJour3">
                <label for="choixJour3">Pass pour la journée du 03/07</label>
            </section>

            <input type="checkbox" name="passSelection" id="pass2jours">
            <label for="pass2jours">Pass 2 jours : 70€</label>

            <!-- Si case cochée, afficher le choix des jours -->
            <section id="pass2joursDate">
                <input type="checkbox" name="passSelection" id="choixJour12">
                <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
                <input type="checkbox" name="passSelection" id="choixJour23">
                <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
            </section>

            <input type="checkbox" name="passSelection" id="pass3jours">
            <label for="pass3jours">Pass 3 jours : 100€</label>


            <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
            <input type="checkbox" name="passSelection" id="pass1jourReduit">
            <label for="pass1jour">Pass 1 jour : 25€</label>
            <input type="checkbox" name="passSelection" id="pass2joursReduit">
            <label for="pass2jours">Pass 2 jours : 50€</label>
            <input type="checkbox" name="passSelection" id="pass3joursReduit">
            <label for="pass3jours">Pass 3 jours : 65€</label>

            <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

            <p class="bouton" onclick="suivant('option')">Suivant</p>
        </fieldset>
        <fieldset id="options">
            <legend>Options</legend>
            <h3>Réserver un emplacement de tente : </h3>
            <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

            <h3>Réserver un emplacement de camion aménagé : </h3>
            <input type="checkbox" class="van" id="vanNuit1" name="vanNuit1">
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" class="van" id="vanNuit2" name="vanNuit2">
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" class="van" id="vanNuit3" name="vanNuit3">
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" class="van" id="van3Nuits" name="van3Nuits">
            <label for="van3Nuits">Pour les 3 nuits (12€)</label>

            <h3>Venez-vous avec des enfants ?</h3>
            <input type="checkbox" name="enfantsOui" id="enfantsOui"><label for="enfantsOui">Oui</label>
            <input type="checkbox" name="enfantsNon" id="enfantsNon"><label for="enfantsNon">Non</label>

            <!-- Si oui, afficher : -->
            <section>
                <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
                <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
                <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants">
                <p>*Dans la limite des stocks disponibles.</p>
            </section>

            <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€ / descente)</h3>
            <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0">

            <p class="bouton" onclick="suivant('coordonnees')">Suivant</p>
        </fieldset>
        <fieldset id="coordonnees">
            <legend>Coordonnées</legend>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
            <label for="telephone">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" required>
            <label for="adressePostale">Adresse Postale :</label>
            <input type="text" name="adressePostale" id="adressePostale" required>

            <input type="submit" name="soumission" class="bouton" value="Réserver">
        </fieldset>
    </form>
</body>

</html>