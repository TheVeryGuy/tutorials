<?php

namespace App;

class Router {
    private $_route = [];


    public function setRoute($dir, $file)
    {
        $this->_route[trim($dir, "/")] = $file;
    }

    public function route() {
        if (!isset($_SERVER['PATH_INFO'])) { //Если открыта главная страница
            include_once '/'; //Открываем файл главной страницы
        } elseif (isset($this->_route[trim($_SERVER['PATH_INFO'], "/")])) { //Если маршрут задан
            include_once $this->_route[trim($_SERVER['PATH_INFO'], "/")]; //Открываем файл, для которого установлен маршрут
        }
        else return false; //Если маршрут не задан

        return true;
    }
}

$route = new Router;
$route->setRoute("page/article-1/", "1.html"); //Устанавливаем маршрут "page/article-1/", и файл который будет открываться при этом маршруте
$route->setRoute("article-2", "2.html");
if (!$route->route()) { //Если маршрут не задан..
    echo "Маршрут не задан";
}

?>