<?php
require __DIR__ . '/../App/autoloader.php';
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
<h1><?php echo $this->articles->title; ?></h1>
<a><?php echo $this->articles->content; ?></a>
</br>

<h1>Автор : <?php echo $this->articles->getAuthors()->getName(); ?></h1>
<a href="/App/deliteAtrticle.php?id=<?php echo $this->articles->getId(); ?>">Удалить</a>



<form action="/App/action.php" method="post">
    <h2>Редактировать</h2>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <textarea name="title"><?php echo $this->articles->title; ?></textarea>
    <textarea name="content"><?php echo $this->articles->content; ?></textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>
