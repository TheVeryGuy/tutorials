<?php

namespace App\Controllers;


use App\Controller;


class Admin extends Controller
{
    protected string $delite;

    protected function handle()
    {
        echo $this->view->render(__DIR__ . '/../../template/adminBar.php');
    }

}