<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database;

try {
    $pdo = Database::getConnection();

    $file = __DIR__ . '/schema.sql';

    if (!file_exists($file)) {
        throw new RuntimeException("Datei 'schema.sql' nicht gefunden.");
    }

    $sql = file_get_contents($file);

    if ($sql === false) {
        throw new RuntimeException("Fehler beim Lesen von schema.sql");
    }

    $pdo->exec($sql);

    echo "✅ Tabellen erfolgreich erstellt.</p>";

} catch (Throwable $e) {

    echo "❌ Fehler: {$e->getMessage()}";

}
