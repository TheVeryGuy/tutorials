<?php
require __DIR__ . '/autoloader.php';

$data = App\Models\Article::findById($_GET['id']);
$data->delete();

header('Location: /');





