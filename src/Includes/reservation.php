    <form action="./src/traitement_Reservation.php" id="inscription" method="post">
        <fieldset id="reservation">
            <legend>Réservation</legend>
            <?php if ($Messages_Erreurs === 2) { ?>
                <div class="message echec">Veuillez remplir tous les champs.</div>
            <?php } ?>
            <h3>Nombre de réservation(s) :</h3>
            <input type="number" name="nombrePlaces" id="NombrePlaces" value="0" required>
            <button class="btn decrease">-</button><button class="btn increase">+</button>
            <h3>Réservation(s) en tarif réduit</h3>
            <input type="checkbox" name="tarifReduit" id="tarifReduit">
            <label for="tarifReduit">Ma réservation sera en tarif réduit*</label>
            <p class="textTarifReduit">* Aucune réduction n’est applicable après le paiement de la commande. La présentation d’un justificatif est obligatoire pour les tarifs réduits liés à l’âge, demandeurs d’emploi (inscrits au pôle emploi en France), bénéficiaires des minima sociaux et détenteurs de la carte de handicap.</p>

            <h3>Choisissez votre formule :</h3>
            <section class="sectionInputs">
                <input type="checkbox" name="pass1jour" id="pass1jour" class="pass1jour">
                <label for="pass1jour" class="pass1jour">Pass 1 jour : 40€</label>
                <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
                <input type="checkbox" name="pass1jourReduction" id="pass1jourReduction" class="pass1jourReduction blocPassInvisible">
                <label for="pass1jourReduction" class="pass1jourReduction blocPassInvisible">Pass 1 jour : 25€</label>
            </section>

            <!-- Si case cochée, afficher le choix du jour -->
            <section id="pass1jourDate" class="blocPassInvisible">
                <div class="colonnes">
                    <div>
                        <input type="checkbox" name="choixJour1" id="choixJour1" class="choixPass1Jour">
                        <label for="choixJour1">Pass pour la journée du 01/07</label>
                    </div>
                    <div>
                        <input type="checkbox" name="choixJour2" id="choixJour2" class="choixPass1Jour">
                        <label for="choixJour2">Pass pour la journée du 02/07</label>
                    </div>
                    <div>
                        <input type="checkbox" name="choixJour3" id="choixJour3" class="choixPass1Jour">
                        <label for="choixJour3">Pass pour la journée du 03/07</label>
                    </div>
                </div>
            </section>

            <section class="sectionInputs">
                <input type="checkbox" name="pass2jours" id="pass2jours" class="pass2jours">
                <label for="pass2jours" class="pass2jours">Pass 2 jours : 70€</label>
                <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
                <input type="checkbox" name="pass2joursReduction" id="pass2joursReduction" class="pass2joursReduction blocPassInvisible">
                <label for="pass2joursReduction" class="pass2joursReduction blocPassInvisible">Pass 2 jours : 50€</label>
            </section>

            <!-- Si case cochée, afficher le choix des jours -->
            <section id="pass2joursDate" class="blocPassInvisible">
                <div class="colonnes">
                    <div>
                        <input type="checkbox" name="choixJour12" id="choixJour12" class="choixPass2Jours">
                        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
                    </div>
                    <div>
                        <input type="checkbox" name="choixJour23" id="choixJour23" class="choixPass2Jours">
                        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
                    </div>
                </div>
            </section>

            <section class="sectionInputs">
                <input type="checkbox" name="pass3jours" id="pass3jours" class="pass3jours">
                <label for="pass3jours" class="pass3jours">Pass 3 jours : 100€</label>
                <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
                <input type="checkbox" name="pass3joursReduction" id="pass3joursReduction" class="pass3joursReduction blocPassInvisible">
                <label for="pass3joursReduction" class="pass3joursReduction blocPassInvisible">Pass 3 jours : 65€</label>
            </section>

            <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

            <p class="bouton options">Suivant</p>
        </fieldset>
        <fieldset id="options">
            <legend>Options</legend>
            <h3>Réserver un emplacement de tente : </h3>
            <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label><br>
            <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label><br>
            <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label><br>
            <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label>
            <?php if ($Messages_Erreurs === 2) { ?>
                <div class="message echec">Veuillez remplir le champ.</div>
            <?php } ?>

            <h3>Réserver un emplacement de camion aménagé : </h3>
            <input type="checkbox" class="van" id="vanNuit1" name="vanNuit1">
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label><br>
            <input type="checkbox" class="van" id="vanNuit2" name="vanNuit2">
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label><br>
            <input type="checkbox" class="van" id="vanNuit3" name="vanNuit3">
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label><br>
            <input type="checkbox" class="van" id="van3Nuits" name="van3Nuits">
            <label for="van3Nuits">Pour les 3 nuits (12€)</label>
            <?php if ($Messages_Erreurs === 2) { ?>
                <div class="message echec">Veuillez remplir le champ.</div>
            <?php } ?>

            <h3>Venez-vous avec des enfants ?</h3>
            <input type="checkbox" name="enfantsOui" id="enfantsOui"><label for="enfantsOui">Oui</label>
            <input type="checkbox" name="enfantsNon" id="enfantsNon"><label for="enfantsNon">Non</label>

            <!-- Si oui, afficher : -->
            <section class="casquesEnfants blocPassInvisible">
                <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
                <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
                <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" value="0">
                <button class="btnEnfants decreaseKids">-</button><button class="btnEnfants increaseKids">+</button>
                <?php if ($Messages_Erreurs === 2) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>
                <p>*Dans la limite des stocks disponibles.</p>
            </section>

            <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€ / descente)</h3>
            <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0" value="0">
            <button class="btnLuges decreaseLuges">-</button><button class="btnLuges increaseLuges">+</button>
            <?php if ($Messages_Erreurs === 2) { ?>
                <div class="message echec">Veuillez remplir le champ.</div>
            <?php } ?>
            <div class="flex">
                <p class="bouton reservation" onclick="suivant('reservation')">Précédent</p>
                <p class="bouton coordonnees" onclick="suivant('coordonnees')">Suivant</p>
            </div>
        </fieldset>
        <fieldset id="coordonnees">
            <legend>Coordonnées</legend>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required><br>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required><br>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>
            <?php if ($Messages_Erreurs === 1) { ?>
                <div class="message echec">Votre email doit être au format email.</div>
            <?php } ?>
            <label for="telephone">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" required><br>
            <?php if ($Messages_Erreurs === 8) { ?>
                <div class="message echec">Veuillez remplir un numéro de téléphone valide.</div>
            <?php } ?>
            <label for="adressePostale">Adresse Postale :</label>
            <input type="text" name="adressePostale" id="adressePostale" required><br>

            <p class="bouton options" onclick="suivant('reservation')">Précédent</p>
            <input type="submit" name="soumission" class="bouton" value="Réserver">
        </fieldset>
    </form>