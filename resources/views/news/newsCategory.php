<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>
<?php include_once "header.php"; ?>

<h3>Список новостей</h3>

<?php foreach ($news as $item): ?>
<a href="/news/<?=$item['category_id']?>/<?=$item['id']?>"><?=$item['title']?></a> <br>
<?php endforeach;?>

</body>
</html>
