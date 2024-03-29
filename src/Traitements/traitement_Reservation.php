<?php

use src\Models\Reservation;
use src\Repositories\ReservationRepository;

require './../../config.php';

if (!empty($_POST['nom']) && isset($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['prenom']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['telephone']) && isset($_POST['telephone']) && !empty($_POST['adressePostale']) && isset($_POST['adressePostale'])) {
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $adressePostale = htmlspecialchars(strip_tags($_POST['adressePostale']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));


    if (!is_numeric($telephone)) {
    
        header('location : /../index.php?erreur=' . ERREUR_TELEPHONE);
    }

    // email verificiation et nettoyage des caractère spéciaux
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($_POST['email']);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
    }

    $totalPrixPass =  0;
    $nombrePlaces = isset($_POST['nombrePlaces']) ? htmlspecialchars(strip_tags((int)$_POST['nombrePlaces'])) :  0;
    $tarifReduit = isset($_POST['tarifReduit']) ? htmlspecialchars(strip_tags((bool)$_POST['tarifReduit'])) : false;
    //pass 1 jour
    if (isset($_POST['pass1jour']) && !empty($_POST['pass1jour']) || !empty($_POST['pass1jourReduction']) && !empty($_POST['pass1jourReduction'])) {
        $pass1jour = isset($_POST['pass1jour']) ? htmlspecialchars(strip_tags((bool)$_POST['pass1jour'])) : false;
        $choixJour1 = isset($_POST['choixJour1']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour1'])) : false;
        $choixJour2 = isset($_POST['choixJour2']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour2'])) : false;
        $choixJour3 = isset($_POST['choixJour3']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour3'])) : false;
        $pass1jourReduction = isset($_POST['pass1jourReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass1jourReduction'])) : false;

        // Validation des pass 1 jour
        if ($pass1jour == true) {
            if ($choixJour1 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
            if ($choixJour2 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
            if ($choixJour3 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
        }

        // Prix des pass 1 jour avec réduction
        if ($tarifReduit == true && $pass1jourReduction == true) {
            if ($choixJour1 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
            if ($choixJour2 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
            if ($choixJour3 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
        }
    }

    if (isset($_POST['pass2jours']) && !empty($_POST['pass2jours']) || !empty($_POST['pass2joursReduction']) && !empty($_POST['pass2joursReduction'])) {
        $nombrePlaces = isset($_POST['nombrePlaces']) ? htmlspecialchars(strip_tags((int)$_POST['nombrePlaces'])) :  0;
        $tarifReduit = isset($_POST['tarifReduit']) ? htmlspecialchars(strip_tags((bool)$_POST['tarifReduit'])) : false;
        $pass2jours = isset($_POST['pass2jours']) ? htmlspecialchars(strip_tags((bool)$_POST['pass2jours'])) : false;
        $choixJour12 = isset($_POST['choixJour12']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour12'])) : false;
        $choixJour23 = isset($_POST['choixJour23']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour23'])) : false;
        $pass2joursReduction = isset($_POST['pass2joursReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass2joursReduction'])) : false;

        // Validation des pass 2 jours
        if ($pass2jours == true) {
            if ($choixJour12 == true) {
                $totalPrixPass = 70 * $nombrePlaces;
            }
            if ($choixJour23 == true) {
                $totalPrixPass = 70 * $nombrePlaces;
            }
        }
        if ($tarifReduit == true && $pass2joursReduction == true) {
            if ($choixJour12 == true) {
                $totalPrixPass = 50 * $nombrePlaces;
            }
            if ($choixJour23 == true) {
                $totalPrixPass = 50 * $nombrePlaces;
            }
        }
    }


    if (isset($_POST['pass3jours']) && !empty($_POST['pass3jours']) || !empty($_POST['pass3joursReduction']) && !empty($_POST['pass3joursReduction'])) {
        $pass3jours = isset($_POST['pass3jours']) ? htmlspecialchars(strip_tags((bool)$_POST['pass3jours'])) : false;
        $pass3joursReduction = isset($_POST['pass3joursReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass3joursReduction'])) : false;

        // Validation des pass 3 jours
        if ($pass3jours == true) {
            $totalPrixPass = 100 * $nombrePlaces;
        }
        if ($tarifReduit == true && $pass3joursReduction == true) {
            $totalPrixPass = 65 * $nombrePlaces;
        }
    }
    $totalPrixPass =  0;
    $nombrePlaces = isset($_POST['nombrePlaces']) ? htmlspecialchars(strip_tags((int)$_POST['nombrePlaces'])) :  0;
    $tarifReduit = isset($_POST['tarifReduit']) ? htmlspecialchars(strip_tags((bool)$_POST['tarifReduit'])) : false;
    //pass 1 jour
    if (isset($_POST['pass1jour']) && !empty($_POST['pass1jour']) || !empty($_POST['pass1jourReduction']) && !empty($_POST['pass1jourReduction'])) {
        $pass1jour = isset($_POST['pass1jour']) ? htmlspecialchars(strip_tags((bool)$_POST['pass1jour'])) : false;
        $choixJour1 = isset($_POST['choixJour1']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour1'])) : false;
        $choixJour2 = isset($_POST['choixJour2']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour2'])) : false;
        $choixJour3 = isset($_POST['choixJour3']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour3'])) : false;
        $pass1jourReduction = isset($_POST['pass1jourReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass1jourReduction'])) : false;

        // Validation des pass 1 jour
        if ($pass1jour == true) {
            if ($choixJour1 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
            if ($choixJour2 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
            if ($choixJour3 == true) {
                $totalPrixPass += 40 * $nombrePlaces;
            }
        }

        // Prix des pass 1 jour avec réduction
        if ($tarifReduit == true && $pass1jourReduction == true) {
            if ($choixJour1 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
            if ($choixJour2 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
            if ($choixJour3 == true) {
                $totalPrixPass += 25 * $nombrePlaces;
            }
        }
    }

    if (isset($_POST['pass2jours']) && !empty($_POST['pass2jours']) || !empty($_POST['pass2joursReduction']) && !empty($_POST['pass2joursReduction'])) {
        $nombrePlaces = isset($_POST['nombrePlaces']) ? htmlspecialchars(strip_tags((int)$_POST['nombrePlaces'])) :  0;
        $tarifReduit = isset($_POST['tarifReduit']) ? htmlspecialchars(strip_tags((bool)$_POST['tarifReduit'])) : false;
        $pass2jours = isset($_POST['pass2jours']) ? htmlspecialchars(strip_tags((bool)$_POST['pass2jours'])) : false;
        $choixJour12 = isset($_POST['choixJour12']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour12'])) : false;
        $choixJour23 = isset($_POST['choixJour23']) ? htmlspecialchars(strip_tags((bool)$_POST['choixJour23'])) : false;
        $pass2joursReduction = isset($_POST['pass2joursReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass2joursReduction'])) : false;

        // Validation des pass 2 jours
        if ($pass2jours == true) {
            if ($choixJour12 == true) {
                $totalPrixPass = 70 * $nombrePlaces;
            }
            if ($choixJour23 == true) {
                $totalPrixPass = 70 * $nombrePlaces;
            }
        }
        if ($tarifReduit == true && $pass2joursReduction == true) {
            if ($choixJour12 == true) {
                $totalPrixPass = 50 * $nombrePlaces;
            }
            if ($choixJour23 == true) {
                $totalPrixPass = 50 * $nombrePlaces;
            }
        }
    }


    if (isset($_POST['pass3jours']) && !empty($_POST['pass3jours']) || !empty($_POST['pass3joursReduction']) && !empty($_POST['pass3joursReduction'])) {
        $pass3jours = isset($_POST['pass3jours']) ? htmlspecialchars(strip_tags((bool)$_POST['pass3jours'])) : false;
        $pass3joursReduction = isset($_POST['pass3joursReduction']) ? htmlspecialchars(strip_tags((bool)$_POST['pass3joursReduction'])) : false;

        // Validation des pass 3 jours
        if ($pass3jours == true) {
            $totalPrixPass = 100 * $nombrePlaces;
        }
        if ($tarifReduit == true && $pass3joursReduction == true) {
            $totalPrixPass = 65 * $nombrePlaces;
        }
    }

    if (!empty($_POST['nombrePlaces'])) {
        header('location: ../index.php?email=' . ERREUR_CHAMP_VIDE);
    }

    if (!empty($_POST['pass1jour']) || !empty($_POST['pass1jourReduction']) || !empty($_POST['pass2jours']) || !empty($_POST['pass2joursReduction']) || !empty($_POST['pass3jours']) || !empty($_POST['pass3joursReduction'])) {
        header('location: ../index.php?email=' . ERREUR_CHAMP_VIDE);
    }
    //prix et nombre de nuit pour la tente 
    $Prix_jour_tente = 0;
    $nombre_de_nuit_tente = 0;
    if (!empty($_POST['tenteNuit1']) || !empty($_POST['tenteNuit2']) || !empty($_POST['tenteNuit3']) || !empty($_POST['tente3Nuits'])) {
        $tenteNuit1 = isset($_POST['tenteNuit1']) ? htmlspecialchars(strip_tags($_POST['tenteNuit1'])) : false;
        $tenteNuit2 = isset($_POST['tenteNuit2']) ? htmlspecialchars(strip_tags($_POST['tenteNuit2'])) : false;
        $tenteNuit3 = isset($_POST['tenteNuit3']) ? htmlspecialchars(strip_tags($_POST['tenteNuit3'])) : false;
        $tente3Nuits = isset($_POST['tente3Nuits']) ? htmlspecialchars(strip_tags($_POST['tente3Nuits'])) : false;
        $Prix_jour_tente =  0;
        $nombre_de_nuit_tente =  0;

        if ($tenteNuit1) {
            $Prix_jour_tente +=  5;
            $nombre_de_nuit_tente++;
        }
        if ($tenteNuit2) {
            $Prix_jour_tente +=  5;
            $nombre_de_nuit_tente++;
        }
        if ($tenteNuit3) {
            $Prix_jour_tente +=  5;
            $nombre_de_nuit_tente++;
        }

        if ($tente3Nuits == true || $tenteNuit1 == true &&  $tenteNuit2 == true && $tenteNuit3 == true) {
            $tente3Nuits = true;
            $tenteNuit1 = false;
            $tenteNuit2 = false;
            $tenteNuit3 = false;
            $Prix_jour_tente = 12;
            $nombre_de_nuit_tente = 3;
        }
    }
    $NombreLugesEte = 0;
    $Prix_jour_van =  0;
    $nombre_de_nuit_van =  0;
    //prix et nombre de nuit pour le van  
    if (!empty($_POST['vanNuit1']) || !empty($_POST['vanNuit2']) || !empty($_POST['vanNuit3']) || !empty($_POST['van3Nuits'])) {
        $vanNuit1 = isset($_POST['vanNuit1']) ? htmlspecialchars(strip_tags($_POST['vanNuit1'])) : false;
        $vanNuit2 = isset($_POST['vanNuit2']) ? htmlspecialchars(strip_tags($_POST['vanNuit2'])) : false;
        $vanNuit3 = isset($_POST['vanNuit3']) ? htmlspecialchars(strip_tags($_POST['vanNuit3'])) : false;
        $van3Nuits = isset($_POST['van3Nuits']) ? htmlspecialchars(strip_tags($_POST['van3Nuits'])) : false;

        if ($vanNuit1) {
            $Prix_jour_van +=  5;
            $nombre_de_nuit_van++;
        }
        if ($vanNuit2) {
            $Prix_jour_van +=  5;
            $nombre_de_nuit_van++;
        }
        if ($vanNuit3) {
            $Prix_jour_van +=  5;
            $nombre_de_nuit_van++;
        }
        if ($van3Nuits == true || $vanNuit1 == true &&  $vanNuit2 == true && $vanNuit3 == true) {
            $van3Nuits = true;
            $vanNuit1 = false;
            $vanNuit2 = false;
            $vanNuit3 = false;
            $Prix_jour_van = 12;
            $nombre_de_nuit_van = 3;
        }
    }

    $nombreCasquesEnfants = 0;
    #ckeck si la cose enfant est coché 
    if (isset($_POST['enfantsOui']) && !empty($_POST['enfantsOui'])) {
        $enfantsOui = (bool) $_POST['enfantsOui'];
        if ($enfantsOui === true) {
            $nombreCasquesEnfants = (int) htmlspecialchars(strip_tags($_POST['nombreCasquesEnfants']));
        } else {
            $nombreCasquesEnfants = 0;
        }
    }

    if (!empty($_POST['nombrePlaces']) && isset($_POST['nombrePlaces'])) {
        htmlspecialchars(strip_tags($_POST['nombrePlaces']));
        $nombrePlaces = (int) $_POST['nombrePlaces'];
        $NombreLugesEte = isset($_POST['NombreLugesEte']) ? (int) $_POST['NombreLugesEte'] : 0;
        $checktarif = (bool) isset($_POST['tarifReduit']);
        if ($checktarif == false) {
            $totalPrixPass += (int) ($nombrePlaces * (($NombreLugesEte * 5) + $Prix_jour_tente)) + ($nombreCasquesEnfants * 2) + $Prix_jour_van;
        } else {
            $totalPrixPass += (int) ($nombrePlaces * (($NombreLugesEte * 5) + $Prix_jour_tente)) + ($nombreCasquesEnfants * 2) + $Prix_jour_van;
        }
    }
    // action finale
    $Data_base = new ReservationRepository();
    $reservation = new Reservation($totalPrixPass, $nombrePlaces, $NombreLugesEte, $nombreCasquesEnfants, $Prix_jour_van, $nombre_de_nuit_van, $Prix_jour_tente, $nombre_de_nuit_tente, $email);

    if (($Data_base->save_reservation($reservation)) == true) {
        header('location: /../connexion.php');
    } else {
        header('location: /../index.php?message=' . ERREUR_ENREGISTREMENT);
    }
} else {
    header('location: /../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}
