<?php

namespace src\Repositories;
session_start();

use Models\Pass;
use src\Models\Database;

class PassRepository{
    
    private $pdo;

    public function __construct(Database $database){

 $this->pdo = $database->getDB();
}

public function addPass(Pass $pass)
{
    try {
        $stmt = $this->pdo->prepare("INSERT INTO asy_pass VALUES(NULL, ?, ?, ?");
        $stmt->execute([$pass->getCHOIXPASS(), $pass->getTARIFPASS(), $pass->getREDUITPASS(), $_SESSION["id"]]);

            return  $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            return "Error";        
    
    }
}


    public function getAllPass()
    {

        $passArray = [];
        $id = $_SESSION["id"];

        try {
            $stmt = $this->pdo->query("SELECT * FROM `asy_pass`");
        } catch (\PDOException $e) {
            var_dump($e);
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $passArray[] = $row;
        }

        return $passArray;
    }
}