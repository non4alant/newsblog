<?php
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
    <link rel="stylesheet" href="../../template/css/authorization.css">
    <link rel="stylesheet" href="../../template/css/bootstrap.min.css">
    <title>Вход в аккаунт</title>
</head>
<body>
    <div class="header">
        <a href="http://work2/news">Назад</a>
    </div>
    <div class="border border-success authorization">
        <h3>Войдите, если уже зарегистрированы</h3>
        <form action="" method="post">
            <p>Ваш логин: </p>
            <input type="text" name="login">
            <br>
            <p>Ваш пароль: </p>
            <input type="password" name="password-login">
            <br>
            <br>
            <input type="submit" value="Войти">
        </form>
    </div>
    <?php
    if (isset($_SESSION['result'])){
        echo $_SESSION['result'];
        unset($_SESSION['result']);
    }
    ?>
</body>
</html>
