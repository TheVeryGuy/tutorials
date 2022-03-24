<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoloader.php';

//$config = \App\Config::getInstance();
//
//echo $config->getData()['db']['host'];

$view = new View();

//$view->assign('articles', Article::findAll('LIMIT 3'));

$view->articles = \App\Models\Article::findAll('LIMIT 3'); // магия



echo $view->render(__DIR__ . '/template/index.php');


?>

