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
<a>Автор : <?php echo $this->articles->getAuthors()->getName(); ?></a>

</body>
</html>
