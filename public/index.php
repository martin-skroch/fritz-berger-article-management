<?php

session_start();

require_once realpath(__DIR__ . '/../vendor/autoload.php');

use App\Controllers\ArticlesController;
use App\Controllers\StatisticsController;

match($_GET['action'] ?? null) {
    default => (new ArticlesController())->index(),
    'create' => (new ArticlesController())->create(),
    'store' => (new ArticlesController())->store(),
    'edit' => (new ArticlesController())->edit(),
    'update' => (new ArticlesController())->update(),
    'delete' => (new ArticlesController())->delete(),
    'statistics' => (new StatisticsController())->index(),
};
