<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Database;
use src\Models\User;

class UserRepository
{
    private $DB;
    private $pdo;
    
    public function __construct()
    {
        $database = new Database;
        
        $this->DB = $database->getDB();
        $this->pdo = $database->getPDO();

        require_once __DIR__ . '/../../config.php';
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM asy_user;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getUserById($id):bool
    {
        $sql = "SELECT * FROM asy_user WHERE ID_USER = :ID_USER";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':ID_USER', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getUserByEmail(string $Mail): User|bool
    {
        $sql = "SELECT * FROM asy_user WHERE EMAIL_USER = :EMAIL_USER";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":EMAIL_USER" => $Mail
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();

        return $retour;
    }

    public function deleteUser(int $id): bool
    { {
            try {
                $sql = "DELETE FROM asy_user WHERE ID_USER = :ID_USER;";

                $statement = $this->DB->prepare($sql);

                return $statement->execute([':ID' => $id]);
            } catch (PDOException $error) {
                echo "Erreur de suppression : " . $error->getMessage();
                return FALSE;
            }
        }
    }

    public function registerUser(User $user)
    {
        $password = $user->getPASSWORDUSER();

        try {
            $stmt = $this->pdo->prepare("INSERT INTO asy_user (NOM_USER, PRENOM_USER, ADRESSE_USER, IS_ADMIN, DATE_RGPD, PASSWORD_USER, EMAIL_USER, TELEPHONE_USER) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user->getNOMUSER(), $user->getPRENOMUSER(), $user->getADRESSEUSER(), '0', $user->getDATERGPD(), $password, $user->getEMAILUSER(), $user->getTELEPHONEUSER()]);

            return true;
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
            return false;
        }
    }


public function checkUserExist(User $user)
{
    $email = $user->getEMAILUSER();

    try {
        $stmt = $this->pdo->query("SELECT * FROM asy_user WHERE EMAIL_USER = '$email' ");
    } catch (PDOException $e) {
        return $e;
    }
    // Vérifie si au moins un utilisateur est trouvé
    if ($stmt->rowCount() > 0) {
        return true;
    }

    return false;
}


    public function updateThisUser(User $user): bool
    {
        $sql = "UPDATE asy_user
            SET
                NOM_USER = :NOM_USER,
                PRENOM_USER = :PRENOM_USER,
                ADRESSE_USER = :ADRESSE_USER,
                IS_ADMIN = :IS_ADMIN,
                EMAIL_USER = :EMAIL_USER,
                TELEPHONE_USER = :TELEPHONE_USER,
                PASSWORD_USER = :PASSWORD_USER
            WHERE ID_USER = :ID_USER";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID_USER' => $user->getIDUSER(),
            ':NOM_USER' => $user->getNOMUSER(),
            ':PRENOM_USER' => $user->getPRENOMUSER(),
            ':ADRESSE_USER' => $user->getADRESSEUSER(),
            ':IS_ADMIN' => $user->getISADMIN(),
            ':EMAIL_USER' => $user->getEMAILUSER(),
            ':TELEPHONE_USER' => $user->getTELEPHONEUSER(),
            ':PASSWORD_USER' => $user->getPASSWORDUSER(),
        ]);

        return $retour;
    }
}
