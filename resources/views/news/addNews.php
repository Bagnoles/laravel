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
<?php include_once "header.php"; ?>

<h4>Форма добавления новости</h4>

<form action="#">
    <label>
        <p>Название новости</p>
        <input type="text">
    </label>
    <label>
        <p>Подробное описание</p>
        <textarea cols="100" rows="20"></textarea>
    </label>
    <label>
        <p>Краткое описание</p>
        <textarea cols="30" rows="10"></textarea>
    </label> <br>
    <input type="submit">
</form>
</body>
</html>
