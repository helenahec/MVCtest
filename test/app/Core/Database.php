<?php

namespace App\Core;

use PDO;
use PDOException;


interface DatabaseInterface

{
    public function getPdo();
}


class Database implements DatabaseInterface

{
    private $pdo;

    public function __construct()

    {
        $config = include __DIR__ . '/../config.php';

        $dsn = 'mysql:host=' . $config['database']['host'] . ';port=' . $config['database']['port'] . ';dbname=' . $config['database']['dbname'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];

        try 
        
        {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        
        catch (PDOException $e) 
        
        {
            echo 'Connection failed: ' . $e->getMessage();

            die();
        }

    }

    public function getPdo()

    {
        return $this->pdo;
    }
    
}
