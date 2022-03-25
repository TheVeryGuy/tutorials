<?php
require __DIR__ . '/App/autoloader.php';

$ctrl = $_GET['ctrl'] ?? 'Index';

$class = '\App\Controllers\\' . $ctrl;

$ctrl = new $class;
$admin = new App\Controllers\Admin();
$admin();

$ctrl();
