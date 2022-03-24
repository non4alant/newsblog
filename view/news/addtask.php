<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Добавить новость!</title>
</head>
<body>
    <div class="header" style="font-size: 25px; float: right;">
        <a href="http://work2/user">Назад</a>
    </div>
    <div class="border border-secondary" style="max-width: 350px; text-align: center; margin: 0 auto; padding: 15px">
        <h3>Добавить новость!</h3>
        <form action="" method="post">
            <p>Заголовок: </p>
            <input type="text" name="title">
            <br>
            <p>Текст новости:</p>
            <textarea name="text" id="" cols="30" rows="10"></textarea>
            <br>
            <br>
            <input type="submit" value="Добавить!">
        </form>
        <div style="color: red">
            <?php
                if (isset($_SESSION['result_news'])){
                    echo $_SESSION['result_news'];
                    unset($_SESSION['result_news']);
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>
