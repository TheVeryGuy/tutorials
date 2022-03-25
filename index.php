<?php
require __DIR__ . '/App/autoloader.php';



$ctrl = $_GET['ctrl'] ?? 'Index';
$user = $_GET['user'] ?? 'user';

if ($user === 'admin') {
    $ctrl .= 'Admin';
}

$class = '\App\Controllers\\' . $ctrl;

$ctrl = new $class;

$ctrl();