<?php

namespace src\Models;

final class Database
{
    private $_DB;
    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/user.csv";
    }

    public function ToutLesUtilisateurs(): array
    {
        $fichier = fopen($this->_DB, "r");
        $utilisateur = [];

        while (($ligne = fgetcsv($fichier, 1000, ",")) !== false) {
            $utilisateur[] = new User($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[0], $ligne[5]);
        }
        fclose($fichier);
        return $utilisateur;
    }

    public function findUserByEmail(string $Mail): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 1000, ",")) !== false) {
            if ($user[3] === $Mail) {
                $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
                break;
            } else {
                $user = false;
            }
        }
        fclose($fichier);
        return $user;
    }

    public function findUserById(int $id): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 500, ",")) !== false) {
            if ($user[0] === $id) {
                $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
                break;
            } else {
                $user = false;
            }
        }
        fclose($fichier);
        return $user;
    }

    public function saveUtilisateur(User $User): bool
    {
        $fichier = fopen($this->_DB, "ab");
        $retour = fputcsv($fichier, $User->getObjectToArray());
        fclose($fichier);
        return $retour;
    }

    public function supprimerUtilisateur(int $IdUser): bool
    {
        if ($this->findUserById($IdUser)) {
            $utilisateurs = $this->ToutLesUtilisateurs();
            $fichier = fopen($this->_DB, 'w');
            foreach ($utilisateurs as $utilisateur) {
                if ($utilisateur->getId() !== $IdUser) {
                    $retour = fputcsv($fichier, $utilisateur->getObjectToArray());
                }
            }
            fclose($fichier);
            return true;
        } else {
            return false;
        }
    }
}
