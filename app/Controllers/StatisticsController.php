<?php

namespace App\Controllers;

use App\Models\Article;

class StatisticsController extends BaseController
{
    public function index(): void
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
            header('Location: /', true, 405);
            exit;
        }

        $statistics = Article::statistics();

        $this->smarty->assign('statistics', $statistics);
        $this->smarty->display('views/statistics/index.tpl', md5(serialize($statistics)));
    }
}
