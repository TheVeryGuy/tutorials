<?php
/**
 * @var array $news
 */
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
<h1>
    <?php
    foreach ($this->data['articles'] as $article){
//    foreach ($this->data['articles'] as $article){
    ?>
    <a href="template/article.php?id=<?php echo $article->getId(); ?>"> <?php echo $article->getTitle(); ?></a>
        <a href="/deliteAtrticle.php?id=<?php echo $article->getId(); ?>">Удалить</a>
        </br></br>
        <?php }
        ?>
</h1>

<form action="/action.php" method="post">
    <h2>Новая статья</h2>
    <input type="hidden" name="id" value="new">
    <textarea name="title">Заголовок</textarea>
    <textarea name="content">Статья</textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>