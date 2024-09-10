<?php
namespace App\Models;
use PDO;
use PDOException;

class Database
{
    private $pdo;

    public function __construct($user = 'root', $pwd = '')
    {
        try {
            $config = require __DIR__ . '/../Config/database.php';
            $dsn = 'mysql:'.http_build_query($config, '', ';');

            $this->pdo = new PDO($dsn, $user, $pwd, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            echo 'Database connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}