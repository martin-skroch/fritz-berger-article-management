<?php

namespace App\Controllers;

use App\Models\Article;

class ArticlesController extends BaseController
{
    public function index(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
            exit;
        }

        $search = $_GET['q'] ?? '';
        $current = $_GET['p'] ?? 1;
        $count = Article::count($search);
        $articles = Article::all($search, $current);

        $paginate = [
            'count' => $count,
            'pages' => (int) ceil($count / Article::$perPage),
            'current' => $current,
        ];

        if (!empty($search) || isset($_SESSION['status'])) {
            $this->smarty->clearCache('views/articles/index.tpl');
        }

        $this->smarty->assign('paginate', $paginate);
        $this->smarty->assign('articles', $articles);
        $this->smarty->assign('search', $search);
        $this->smarty->display('views/articles/index.tpl', md5(count($articles) . serialize($paginate)));

        if (!is_null($_SESSION['status'])) {
            $_SESSION['status'] = [];
        }
    }

    public function create(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
            exit;
        }

        if (!is_null($_SESSION['validation'])) {
            $this->smarty->clearCache('views/articles/create.tpl');
        }

        $this->smarty->display('views/articles/create.tpl');

        if (!is_null($_SESSION['validation'])) {
            $_SESSION['validation'] = [];
        }
    }

    public function store(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
            header('Location: /index.php?action=create', true, 405);
            exit;
        }

        $name = (string) htmlspecialchars($_POST['name']);
        $number = (string) htmlspecialchars($_POST['number']);
        $price = (float) htmlspecialchars($_POST['price']);

        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Das Feld „Artikelname“ darf nicht leer sein.';
        }

        if (empty($number)) {
            $errors['number'] = 'Das Feld „Artikelnummer“ darf nicht leer sein.';
        }

        if (empty($price)) {
            $errors['price'] = 'Das Feld „Verkaufspreis“ darf nicht leer sein und muss eine gültige Dezimalzahl enthalten.';
        }

        if (count($errors) > 0) {
            $_SESSION['validation'] = [
                'errors' => $errors,
                'data' => $_POST,
            ];

            $this->smarty->clearCache('views/articles/create.tpl');

            header('Location: /index.php?action=create', true, 302);
            exit;
        }

        Article::create(
            name: $name,
            number: $number,
            price: $price,
        );

        $_SESSION['status'] = [
            'type' => 'success',
            'message' => 'Der Artikel „' . $name . '“ wurde erstellt.',
        ];

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/statistics/index.tpl');

        header('Location: /index.php?q=', true, 302);
        exit;
    }

    public function edit(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
            exit;
        }

        if (!is_null($_SESSION['validation'])) {
            $this->smarty->clearCache('views/articles/edit.tpl');
        }

        $id = (int) htmlspecialchars($_GET['id']);

        $article = Article::find($id);

        $this->smarty->assign('article', $article);

        $view = $this->smarty->fetch('views/articles/edit.tpl', md5(serialize($article)));

        echo $view;

        if (!is_null($_SESSION['validation'])) {
            $_SESSION['validation'] = [];
        }
    }

    public function update(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
            header('Location: /index.php', true, 405);
            exit;
        }

        $id = (int) htmlspecialchars($_POST['id']);
        $name = (string) htmlspecialchars($_POST['name']);
        $number = (string) htmlspecialchars($_POST['number']);
        $price = (float) htmlspecialchars($_POST['price']);

        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Das Feld „Artikelname“ darf nicht leer sein.';
        }

        if (empty($number)) {
            $errors['number'] = 'Das Feld „Artikelnummer“ darf nicht leer sein.';
        }

        if (empty($price)) {
            $errors['price'] = 'Das Feld „Verkaufspreis“ darf nicht leer sein und muss eine gültige Dezimalzahl enthalten.';
        }

        if (count($errors) > 0) {
            $_SESSION['validation'] = [
                'errors' => $errors,
                'data' => $_POST,
            ];

            $this->smarty->clearCache('views/articles/edit.tpl');

            header('Location: /index.php?action=edit&id=' . $id, true, 302);
            exit;
        }

        Article::update(
            id: $id,
            name: $name,
            number: $number,
            price: $price,
        );

        $_SESSION['status'] = [
            'type' => 'success',
            'message' => 'Der Artikel „' . $name . '“ wurde gespeichert.',
        ];

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/statistics/index.tpl');

        header('Location: /index.php', true, 302);
        exit;
    }

    public function delete(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /index.php', true, 405);
        }

        $id = (int) htmlspecialchars($_GET['id']);

        $article = Article::find($id);

        Article::delete($id);

        $_SESSION['status'] = [
            'type' => 'success',
            'message' => 'Der Artikel „' . $article['name']. '“ wurde gelöscht.',
        ];

        $this->smarty->clearCache('views/articles/edit.tpl');
        $this->smarty->clearCache('views/articles/index.tpl');
        $this->smarty->clearCache('views/statistics/index.tpl');

        header('Location: /index.php', true, 302);
        exit;
    }
}
