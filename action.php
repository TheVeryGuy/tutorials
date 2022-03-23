<?php
require __DIR__ . '/autoloader.php';
if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['content'])) {
    echo 'ХЕРНЮ ПРИСЛАЛ';
    header('Location:' . $_SERVER['HTTP_REFERER']);
    die();
}
if ('new' === $_POST['id']) {
    $data = new \App\Models\Article();
    $data->title = $_POST['title'];
    $data->content = $_POST['content'];
    $data->save();
    echo $data->id;
    header('Location:' . $_SERVER['HTTP_REFERER']);
    die();
}
$data = App\Models\Article::findById($_POST['id']);
$data->title = $_POST['title'];
$data->content = $_POST['content'];
$data->save();
echo $data->id;


header('Location:' . $_SERVER['HTTP_REFERER']);