<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

use App\Controllers\ArticlesController;

match($_GET['action'] ?? null) {
    default => (new ArticlesController())->index(),
    'create' => (new ArticlesController())->create(),
    'store' => (new ArticlesController())->store(),
    'edit' => (new ArticlesController())->edit(),
    'update' => (new ArticlesController())->update(),
    'delete' => (new ArticlesController())->delete(),
    'statistics' => (new ArticlesController())->statistics(),
};
