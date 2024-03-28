<?php

namespace src\Models;

use PDO;
use PDOException;

class Database
{
    private $DB;
    private $config;


    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        $this->connexionDB();
    }

    private function connexionDB(): void
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->DB = new PDO($dsn, DB_USER, DB_PWD);
        } catch (PDOException $error) {
            echo "Quelque chose s'est mal passé : " . $error->getMessage();
        }
    }

    public function getDB()
    {
        return $this->DB;
    }

    public function initializeDB(): string
    {

        // Vérifier si la base de données est vide
        if ($this->testIfTablePassExists()) {
            return "La base de données semble déjà remplie.";
            die();
        }
        // Télécharger le fichier sql d'initialisation dans la BDD
        try {
            $sql = file_get_contents(__DIR__ . "/../Migrations/vercors_v2.sql");

            $this->DB->query($sql);
            // Mettre à jour le fichier config.php

            if ($this->MiseAJourConfig()) {
                return "installation de la Base de Données terminée !";
                die();
            }
        } catch (PDOException $erreur) {
            return "impossible de remplir la Base de données : " . $erreur->getMessage();
            die();
        }
    }

    private function testIfTablePassExists(): bool
    {
        $existant = $this->DB->query('SHOW TABLES FROM ' . DB_NAME . ' like \'asy_pass\'')->fetch();

        if ($existant !== false && $existant[0] == "asy_pass") {
            return true;
        } else {
            return false;
        }
    }

    private function MiseAJourConfig(): bool
    {

        $fconfig = fopen($this->config, 'w');

        $contenu = "<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', '" . DB_HOST . "');
    define('DB_NAME', '" . DB_NAME . "');
    define('DB_USER', '" . DB_USER . "');
    define('DB_PWD', '" . DB_PWD . "');
    define('HOME_URL', '/');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);";


        if (fwrite($fconfig, $contenu)) {
            fclose($fconfig);
            return true;
        } else {
            fclose($fconfig);
            return false;
        }
    }

    public function ToutLesUtilisateurs(): array
    {
        $fichier = fopen($this->DB, "r");
        $utilisateur = [];

        while (($ligne = fgetcsv($fichier, 1000, ",")) !== false) {
            $utilisateur[] = new User($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[0], $ligne[5]);
        }
        fclose($fichier);
        return $utilisateur;
    }

    public function findUserByEmail(string $Mail): User|bool
    {
        $fichier = fopen($this->DB, "r");
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
        $fichier = fopen($this->DB, "r");
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
        $fichier = fopen($this->DB, "ab");
        $retour = fputcsv($fichier, $User->getObjectToArray());
        fclose($fichier);
        return $retour;
    }

    public function supprimerUtilisateur(int $IdUser): bool
    {
        if ($this->findUserById($IdUser)) {
            $utilisateurs = $this->ToutLesUtilisateurs();
            $fichier = fopen($this->DB, 'w');
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
