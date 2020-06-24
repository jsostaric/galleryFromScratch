<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll($sql, $bind = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bind);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch($sql, $bind = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bind);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}