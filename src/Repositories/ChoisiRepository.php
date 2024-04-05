<?php

namespace src\Repositories;
session_start();

use Models\Choisi;
use src\Models\Database;

class ChoisiRepository{
    private $pdo;

    public function __construct(Database $database)
    {

        $this->pdo = $database->getDB();
    }
}