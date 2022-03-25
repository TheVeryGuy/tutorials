<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Article;


class ArticleAdmin extends Controller
{
    protected function handle()
    {
        $articleId = $_GET['id'] ?? $_POST['id'];

        if ()

        $this->view->articles = \App\Models\Article::findById($articleId);
        echo $this->view->render(__DIR__ . '/../../template/articleAdmin.php');
    }

//    protected function access(): bool
//    {
//       return isset($_GET['user']) && 'admin' === $_GET['user'];
//    }
}