<?php
/**
 * @vae \App\View
 * @var array $news
 * @var \SebastianBergmann\Timer\Timer $duration
 */
?>
</head>
<body>
<h1>
    <?php
//    foreach ($this->data['articles'] as $article) {
//
//    }
    foreach ($this->articles as $article) {//магия
        ?>
        <a href="/?ctrl=Article&id=<?php echo $article->getId(); ?>"> <?php echo $article->getTitle(); ?></a>
        <a>Автор : <?php echo $article->getAuthors()->getName() ?></a>
        </br></br>
    <?php }
    ?>
</h1>
</body>
<footer>
<?php echo 'Шаблон отрисован за : ' . $duration->stop()->asString() ?>
</footer>
</html>