<?php
    if (isset($_POST['comment'])){
        header("Location: http://work2/comment/");
        exit();
    }

    if (isset($_POST['comment_read'])){
        header("Location: http://work2/com/");
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
        <h3>Комментарии к записи:</h3>
        <form action="" method="post">
            <input type="submit" name="comment_read" value="Читать комментарий">
        </form>
        <hr>
        <form action="" method="post">
            <input type="submit" name="comment" value="Написать комментарий">
        </form>
    </div>
</body>
</html>
