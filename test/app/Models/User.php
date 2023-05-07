<?php

namespace App\Models;

use PDO;

interface UserInterface

    {
        public function findByUsername(string $username): ?array;
        public function verifyPassword($password, $hash);
    }

class User implements UserInterface

{
    private $pdo;

    public function __construct(PDO $pdo)
    
    {
        $this->pdo = $pdo;
    }

    public function findByUsername(string $username): ?array

    {
        $statement = $this->pdo->prepare("SELECT * FROM test.users WHERE username = :username");

        $statement->bindParam(':username', $username);
        
        $statement->execute();
    
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $user ?: null;
    }
    
    public function verifyPassword($password, $hash)

    {
        return password_verify($password, $hash);
 
    }

}
