<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>
<?php include_once "header.php"; ?>
<h3>Новости по категориям</h3>

<ul>
    <?php foreach ($categories as $category): ?>
    <li><a href="/news/<?=$category['id']?>"><?=$category['name']?></a></li>
    <?php endforeach;?>
</ul>

</body>
</html>
