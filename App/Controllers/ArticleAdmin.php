<?php

namespace App\Controllers;


use App\Controller;
use App\DbException;
use App\Models\Article;


class ArticleAdmin extends Controller
{
    /**
     * Ищет статью по ID в БД. И выводит её в шаблоне с правами админа
     * @return void
     * @throws DbException
     */
    protected function handle(array $params): void
    {
        $articleId = $_GET['id'] ?? $_POST['id'];

        $this->view->articles = Article::findById($articleId);
        echo $this->view->render(__DIR__ . '/../../template/articleAdmin.php', $params);
    }

}

