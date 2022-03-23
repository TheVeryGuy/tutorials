<?php
require __DIR__ . '/../autoloader.php';
$artticle = App\Models\Article::findById($_GET['id']);
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
<h1><?php echo $artticle->getTitle(); ?></h1>
<a><?php echo $artticle->getContent(); ?></a>

<form action="/action.php" method="post">
    <h2>Редактировать</h2>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <textarea name="title"><?php echo $artticle->getTitle(); ?></textarea>
    <textarea name="content"><?php echo $artticle->getContent(); ?></textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>
