<?php

namespace App\Models;

use App\Database;
use PDO;

class Article
{
    protected static $table = 'articles';

    public static function all(?string $search = null): array
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM " . self::$table;
        $params = [];

        if ($search) {
            $sql .= " WHERE name LIKE :search OR number LIKE :search";
            $params['search'] = '%' . $search . '%';
        }

        $sql .= " ORDER BY updated_at DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM " . self::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(string $name, string $number, float $price): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO " . self::$table . " (name, number, price) VALUES (:name, :number, :price)");
        $stmt->execute(compact('name', 'number', 'price'));
    }

    public static function update(int $id, string $name, string $number, float $price): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE " . self::$table . " SET name = :name, number = :number, price = :price WHERE id = :id");
        $stmt->execute(compact('id', 'name', 'number', 'price'));
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM " . self::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function statistics(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT LEFT(number, 2) AS prefix, COUNT(*) AS count, SUM(price) AS total_price
            FROM " . self::$table . "
            GROUP BY prefix
            ORDER BY prefix
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
