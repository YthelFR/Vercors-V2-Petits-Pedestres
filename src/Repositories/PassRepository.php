<?php

namespace Repository;
session_start();
use Models\Database;
use Models\Pass;

class Passrepository{
    
    private $pdo;

    public function __construct(Database $database)
}{
    $this->pdo = $database->getPDO();

}

public function addPass(PASS $pass)
{
    try {
        $stmt = $this->pdo->prepare("INSERT INTO PASS VALUES(NULL, ?, ?, ?");
        $stmt->execute([$pass->get])
    }
}