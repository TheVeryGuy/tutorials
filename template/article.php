<?php
require __DIR__ . '/../autoloader.php';
$article = App\Models\Article::findById($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?php echo $article->getTitle(); ?></h1>
<a><?php echo $article->getContent(); ?></a>
</br>
<a>Автор : <?php echo $article->getAuthors()->getName(); ?></a>

<form action="/action.php" method="post">
    <h2>Редактировать</h2>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <textarea name="title"><?php echo $article->getTitle(); ?></textarea>
    <textarea name="content"><?php echo $article->getContent(); ?></textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>
