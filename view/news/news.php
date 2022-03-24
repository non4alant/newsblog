<?php
session_start();
$_SESSION['id'] = $newsItem['id'];
if (!isset($newsItem['id']) || $newsItem['id'] == null){
    header("Location: http://work2/user");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div>
    <a href="http://work2/user" style="float: left">Назад</a>
    <br>
    <br>
    <br>
    <h3>Новость №<?= $newsItem['id'] ?></h3>


    <p>Заголовок: <?= $newsItem['title']?></p>
    <p>Новость: <?= $newsItem['text']?></p>
    <hr>
    <?php
        if (!isset($_SESSION['name'])){
            ?>
            <h3>Читать и писать комментарии могут только зарегестрированые пользователи!</h3>
            <?php
            exit();
        }
    ?>
    <?php require_once ROOT . '/view/comment/index.php';
    ?>

</div>
</body>
</html>
