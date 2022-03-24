<?php
session_start();
if (isset($_SESSION['name'])){
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
    <link rel="stylesheet" href="../../template/css/registrationuser.css">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="header" style="float: right; font-size: 25px;">
        <a href="http://work2/news">Назад!</a>
    </div>
    <div class="border border-success registration" style="margin-top: 50px;">
        <h3>Зарегестрируйтесь, чтобы писать новости и комментарии</h3>
        <div class="registration_form">
            <form action="" method="post">
                <p>Ваше имя:</p>
                <input type="text" name="name">
                <br>
                <p>Ваша почта:</p>
                <input type="text" name="email">
                <br>
                <p>Придумайте пароль: </p>
                <input type="password" name="password">
                <br>
                <p>Продублируйте пароль: </p>
                <input type="password" name="password-repeat">
                <br>
                <br>
                <input type="submit" value="Зарегистрироваться">
            </form>
        </div>
        <?php
        if (isset($_SESSION['result']))
            echo $_SESSION['result'];
            unset($_SESSION['result'])
        ?>
    </div>
</body>
</html>
