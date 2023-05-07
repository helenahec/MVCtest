<?php

namespace App\Models;

use PDO;

interface NewsModelInterface

{
    public function getAll(): array;
    public function getById(int $id): array;
    public function create(string $title, string $description): int;
    public function update(int $id, string $title, string $description): void;
    public function delete(int $id): void;

}


class News implements NewsModelInterface

{
    private $pdo;

    public function __construct(PDO $pdo)

    {
        $this->pdo = $pdo;
    }

    public function getAll(): array

    {
        $statement = $this->pdo->query('SELECT * FROM test.news');

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): array

    {
        $statement = $this->pdo->prepare('SELECT * FROM test.news WHERE id = :id');

        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $title, string $description): int

    {
        $statement = $this->pdo->prepare('INSERT INTO test.news (title, description) VALUES (:title, :description)');

        $statement->execute(['title' => $title, 'description' => $description]);

        return $this->pdo->lastInsertId();
    }

    public function update(int $id, string $title, string $description): void

    {
        $statement = $this->pdo->prepare("UPDATE test.news SET title = ?, description = ? WHERE id = ?");

        $statement->execute([$title, $description, $id]);
    }

    public function delete(int $id): void

    {
        $statement = $this->pdo->prepare('DELETE FROM test.news WHERE id = :id');

        $statement->execute(['id' => $id]);
    }
    
}
