<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database;
use Faker\Factory as Faker;

try {
    $pdo = Database::getConnection();
    $faker = Faker::create('de_DE');

    $pdo->exec('CREATE TABLE IF NOT EXISTS articles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        number VARCHAR(20) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );');

    $articles = [];

    foreach (range(1, 30) as $article) {
        $area = implode('', $faker->randomElements(range('A', 'D'), 1));

        array_push($articles, [
            'name' => ucfirst($faker->words(2, true)),
            'number' => $faker->numerify($area . '0######'),
            'price' => $faker->randomFloat(2, 50, 500),
        ]);
    }

    $inserts = array_map(fn($article) => "('" . $article['name'] . "', '" . $article['number'] . "', " . $article['price'] . ")", $articles);

    $pdo->exec('INSERT INTO articles (name, number, price) VALUES ' . implode(', ', $inserts) . ';');

    $output = shell_exec('rm -rf ./storage/cache ./storage/compiled');

    echo "✅ Tabellen erfolgreich erstellt.\n";

} catch (Throwable $e) {

    echo "❌ Fehler: {$e->getMessage()}\n";

}
