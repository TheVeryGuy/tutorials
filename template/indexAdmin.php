<?php
/**
 * @var array $news
 */
?>
</head>
<body>
<h1>
    <?php
    //    foreach ($this->data['articles'] as $article){
    foreach ($this->articles as $article) {//магия
        ?>
        <a href="/?ctrl=Article&user=admin&id=<?php echo $article->getId(); ?>"> <?php echo $article->getTitle(); ?></a>
        <a href="/App/deliteAtrticle.php?id=<?php echo $article->getId(); ?>">Удалить</a>
        <a>Автор : <?php echo $article->getAuthors()->getName() ?></a>
        </br></br>
    <?php }
    ?>
</h1>

<form action="/App/action.php" method="post">
    <h2>Новая статья</h2>
    <input type="hidden" name="id" value="new">
    <textarea name="title">Заголовок</textarea>
    <textarea name="content">Статья</textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>