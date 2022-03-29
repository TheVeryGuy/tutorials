<?php

namespace App\Controllers;


use App\Controller;
use App\DbException;


class Article extends Controller
{

    /**
     * Ищет статью по ID в БД. И выводит её в шаблоне
     * @return void
     * @throws DbException
     */
    protected function handle(array $params): void
    {
        $articleId = $_GET['id'] ?? $_POST['id'];
        $this->view->articles = \App\Models\Article::findById($articleId);
        echo $this->view->render(__DIR__ . '/../../template/article.php', $params);
    }
}