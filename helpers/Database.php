<?php

require_once __DIR__ . '/../config/config.php';

class Database
{
    public static function connect()
    {
        $pdo = new PDO(DSN, USER, PASSWORD);
        
        return $pdo;
    }
}
