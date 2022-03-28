<?php
require __DIR__ . '/App/autoloader.php';



$ctrl = $_GET['ctrl'] ?? 'Index';
$user = $_GET['user'] ?? 'user';
$logger = new \App\Logger();
if ($user === 'admin') {
    $ctrl .= 'Admin';
}

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class;
    $ctrl();
} catch (\App\DbException $ex) {
    $logger->addLog($ex);
    echo 'Ошибка в БД: ' . $ex->getMessage();
    die();
} catch (Exception $error) {
    $logger->addLog($error);
    throw $error;
}