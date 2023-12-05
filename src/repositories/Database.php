<?php

namespace Desis\Repositories;

use SQLite3;

class Database
{
    private $db;

    public function __construct()
    {
     
        $dbFile = __DIR__ . "/../..".$_ENV['DB_FILE'];
        $this->db = new SQLite3($dbFile);
        
        if (!$this->db) {
            die('Error al conectar con la base de datos.');
        }
    }

    public function getDB()
    {
        return $this->db;
    }
}