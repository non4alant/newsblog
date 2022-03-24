<?php
session_start();
?>

<?php foreach ($commentList as $commentItem):?>
    <p>Комментарий: <?= $commentItem['text']?></p>
    <hr>
<?php endforeach;?>
<?php

?>