<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Article;


class IndexAdmin extends Controller
{
    protected function handle()
    {
        $this->view->articles = Article::findAll('ORDER BY title LIMIT 3'); // магия
        echo $this->view->render(__DIR__ . '/../../template/indexAdmin.php');
    }

}