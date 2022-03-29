<?php
/**
 * @var array $news
 * @var \SebastianBergmann\Timer\Timer $duration
 */

use App\View;
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
<h1><?php echo $this->articles->getTitle(); ?></h1>
<a><?php echo $this->articles->getContent(); ?></a>
</br>
<a>Автор : <?php echo $this->articles->getAuthors()->getName(); ?></a>

</body>
<footer>
    <?php echo 'Шаблон отрисован за : ' . $duration->stop()->asString() ?>
</footer>
</html>
