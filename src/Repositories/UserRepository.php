<?php

namespace src\Repositories;

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

    public function ToutLesUtilisateurs(): array
    {
    }

    public function findUserByEmail(string $Mail): User|bool
    {
    }

    public function findUserById(int $id): User|bool
    {
    }

    public function supprimerUtilisateur(int $IdUser): bool
    {
    }

    public function register(User $user)
    {
        $password = hash("whirlpool", $user->getPASSWORDUSER());

        try {
            $stmt = $this->pdo->prepare("INSERT INTO asy_user VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user->getNOMUSER(), $user->getPRENOMUSER(), $user->getADRESSEUSER(), $password]);

            return  "Inserted";
        } catch (\PDOException $e) {
            return "Error";
        }
    }


    public function checkUserExist(User $user)
    {
        $email = $user->getEmail_user();

        try {
            $stmt = $this->pdo->query("SELECT * FROM user WHERE email = '$email' ");
        } catch (\PDOException $e) {
            return $e;
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User($row);
        }

        return $stmt->rowCount() == 1;
    }
}
