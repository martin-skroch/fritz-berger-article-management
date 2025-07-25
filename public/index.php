<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$productController = new App\Controllers\ArticlesController();

match($_GET['action'] ?? null) {
    default => $productController->index(),
    'create' => $productController->create(),
    'store' => $productController->store(),
    'edit' => $productController->edit(),
    'update' => $productController->update(),
    'delete' => $productController->delete(),
    'statistics' => $productController->statistics(),
};
