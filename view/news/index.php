<?php
if (isset($_SESSION['name'])){
    header("Location: http://work2/user/");
    exit();
}
$link = "http://work2/news/";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../template/css/mainpage.css">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Главная</title>
</head>
<body>
    <div class="header">
        <div class="login" style="margin-right: 10px; margin-top: 10px">
            <ul>
                <li>
                    <a href="http://work2/registration">Зарегестрироваться</a>
                </li>
                <li>
                    <a href="http://work2/authorization" style="margin-left: 110px">Войти</a>
                </li>

            </ul>
        </div>
        <div class="title">
            <h1>Новости</h1>
        </div>
    </div>
    <?php foreach ($newsList as $newsItem):?>
        <p>Автор: <?= $newsItem['id_user']?></p>
        <p>Заголовок: <?= $newsItem['title']?></p>
        <p>Новость: <?= $newsItem['text']?></p>
        <a href="<?= $link . $newsItem['id']?>">Просмотреть новость</a>
        <hr>

    <?php endforeach;?>
</body>
</html>
