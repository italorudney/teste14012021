<?php

namespace App\DAO;

abstract class Conexao
{
    protected $pdo;

    public function __construct()
    {
        $host = getenv('HOST');
        $port = getenv('PORT');
        $dbname = getenv('DBNAME');
        $user = getenv('USER');
        $password = getenv('PASSWORD');
        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";
        
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}
