<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Nuitee;

class NuiteeRepository{

    private $pdo;

    public function __construct(Database $database){
        $this->pdo = $database->getDB();
    }

    public function getAllNuitees(Nuitee $nuiteesArray){

        $nuiteesArray = [];


        try {
            $stmt = $this->pdo->query("SELECT * asy_nuitee ");
        } catch (\PDOException $e) {
            var_dump($e);

        }
           while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                  $nuiteesArray[] = $row;
            }
    }

    
}