<?php

namespace App\Controllers;


use App\Controller;



class Article extends Controller
{


    protected function handle()
    {
        $articleId = $_GET['id'] ?? $_POST['id'];
        
        $this->view->articles = \App\Models\Article::findById($articleId);
        echo $this->view->render(__DIR__ . '/../../template/article.php');
    }
}