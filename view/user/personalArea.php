<?php
session_start();
if (isset($_POST['exit'])){
    unset($_SESSION['name']);
    header("Location: http://work2/news");
    exit();
}
if (isset($_POST['add'])){
    header("Location: http://work2/add");
    exit();
}
if (!isset($_SESSION['name'])){
    header("Location: http://work2/news");
    exit();
}
$link = "http://work2/comment/";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Личный кабинет!</title>
</head>
<body>
    <div style="float: right">
        <form action="" method="post">
            <input type="submit" name="exit" value="Выход из аккаунта">
        </form>
    </div>
    <p style="font-size: 30px;">Личный кабинет! <?= $_SESSION['name']?></p>
    <div class="button__add" style="text-align: center; padding: 20px; font-size: 20px">
        <form action="" method="post">
            <input type="submit" name="add" value="Добавить новость">

        </form>
    </div>
    <div>
        <?php foreach ($newsList as $newsItem):?>
            <p>Автор: <?= $newsItem['id_user']?></p>
            <p>Заголовок: <?= $newsItem['title']?></p>
            <p>Новость: <?= $newsItem['text']?></p>
            <a href="<?= $link . $newsItem['id']?>">Просмотреть новость</a>
            <hr>

        <?php endforeach;?>
    </div>
</body>
</html>
