<?php

namespace App\Controllers;

use App\Helper;
use App\Models\Article;
use Smarty\Smarty;
use Smarty\Template;

class ArticlesController
{
    private Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../templates/');
        // $this->smarty->setConfigDir(__DIR__ . '/../../config');
        $this->smarty->setCompileDir(__DIR__ . '/../../storage/compiled');
        $this->smarty->setCacheDir(__DIR__ . '/../../storage/cache');

        $this->smarty->setEscapeHtml(true);
        $this->smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;

        $this->smarty->assign('assetsUrl', '/assets/');
    }

    public function index(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
        }

        $search = $_GET['q'] ?? '';
        $articles = Article::all($search);

        $this->smarty->assign('articles', $articles);
        $this->smarty->assign('search', $search);
        $this->smarty->display('views/articles/index.tpl', md5(count($articles)));
    }

    public function create(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
        }

        $this->smarty->display('views/articles/create.tpl');
    }

    public function store(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
            header('Location: /index.php?action=create', true, 405);
        }

        $data = array_map(fn($input) => htmlspecialchars($input), $_POST);

        Article::create(
            name: $data['name'],
            number: $data['number'],
            price: $data['price']
        );

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/articles/statistics.tpl');

        header('Location: /index.php', true, 302);
        exit;
    }

    public function edit(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
        }

        $article = Article::find(htmlspecialchars($_GET['id']));

        $this->smarty->assign('article', $article);
        $this->smarty->display('views/edit.tpl', md5(serialize($article)));
    }

    public function update(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
            header('Location: /index.php', true, 405);
        }

        $data = array_map(fn($input) => htmlspecialchars($input), $_POST);

        Article::update(
            id: intval($data['id']),
            name: $data['name'],
            number: $data['number'],
            price: $data['price'],
        );

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/articles/statistics.tpl');

        header('Location: /index.php', true, 302);
        exit;
    }

    public function delete(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /index.php', true, 405);
        }

        Article::delete(intval($_GET['id']));

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/articles/statistics.tpl');

        header('Location: /index.php', true, 302);
        exit;
    }

    public function statistics(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
        }

        $statistics = Article::statistics();

        $this->smarty->assign('statistics', $statistics);
        $this->smarty->display('views/articles/statistics.tpl', md5(serialize($statistics)));
    }
}
