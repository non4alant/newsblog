<?php
session_start();

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
    <title>Ваш комментарий</title>
</head>
<body>
<a href="<?= $link . $_SESSION['id']?>">Назад</a>
<div style="max-width: 350px; padding: 20px; text-align: center; margin: 0 auto;">
    <form class="border border-secondary" action="" method="post">
        <p>Ваш комментарий:</p>
        <form>
            <textarea name="comm" id="" cols="30" rows="10"></textarea>
            <br>
            <br>
            <input type="submit" value="Опубликовать комментарий">
        </form>
    </form>
    <?php
        if (isset($_SESSION['result_comm'])){
            echo $_SESSION['result_comm'];
            unset($_SESSION['result_comm']);
        }
    ?>
</div>
</body>
</html>
