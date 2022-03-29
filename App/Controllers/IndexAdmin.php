<?php

namespace App\Controllers;


use App\Controller;
use App\DbException;
use App\Models\Article;


class IndexAdmin extends Controller
{
    /**
     * Ищет 3 статьи в БД и выводит их на главную страницу c правами админа
     * @return void
     * @throws DbException
     */
    protected function handle(array $params)
    {
        $this->view->articles = Article::findAll('ORDER BY title LIMIT 3'); // магия
        echo $this->view->render(__DIR__ . '/../../template/indexAdmin.php', $params);
    }

}