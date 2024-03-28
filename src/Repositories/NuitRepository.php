<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Nuit;

class NuitRepository{

    private $pdo;
    public function __construct(Database $DB){
        $this->pdo = $DB->getDB();
    }
public function addNuit(\Nuit $nuit){
      try {
            $stmt = $this->pdo->prepare("INSERT INTO asy_nuit VALUES(NULL, ?, ?)");
            $stmt->execute([$nuit->getTYPENUIT(), $nuit->getPRIXNUIT(), $_SESSION["id"]]);

            return  $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            return "Error";
        }
}
public function getAllNuits(){


        $nuitsArray = [];

        try {
            $stmt = $this->pdo->query("SELECT * FROM asy_nuit ");

        } catch (\PDOException $e) {
            var_dump($e);

        }
           while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $nuitsArray[] = $row;
            }

            return $nuitsArray;
}
}