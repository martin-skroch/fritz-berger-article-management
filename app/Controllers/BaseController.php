<?php

namespace App\Controllers;

use App\Services\Environment;
use Dotenv\Dotenv;
use Dotenv\Exception\ValidationException;
use Smarty\Smarty;

class BaseController
{
    protected Smarty $smarty;

    public function __construct()
    {
        try {
            $env = Dotenv::createUnsafeImmutable(realpath(__DIR__ . '/../..'));
            $env->safeLoad();
            $env->required(['DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD'])->notEmpty();
        } catch (ValidationException $e) {
            echo "Fehler: " . $e->getMessage();
            exit;
        }

        $this->smarty = new Smarty();
        $this->smarty->setEscapeHtml(true);
        $this->smarty->setTemplateDir(__DIR__ . '/../../templates/');
        $this->smarty->setCompileDir(__DIR__ . '/../../storage/compiled');
        $this->smarty->setCacheDir(__DIR__ . '/../../storage/cache');

        if ( getenv('APP_ENV') === 'production' ) {
            $this->smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
        } else {
            $this->smarty->setCaching(Smarty::CACHING_OFF);
        }
    }
}
