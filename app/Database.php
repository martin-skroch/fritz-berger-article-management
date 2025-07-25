<?php

namespace App;

use Dotenv\Dotenv;
use Dotenv\Exception\ValidationException;
use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        
        try {
            $env = Dotenv::createUnsafeImmutable(realpath(__DIR__ . '/..'));
            $env->safeLoad();
            $env->required(['DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD'])->notEmpty();
        } catch (ValidationException $e) {
            echo "Fehler: " . $e->getMessage();
            exit;
        }

        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8mb4', getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$pdo;
    }
}
