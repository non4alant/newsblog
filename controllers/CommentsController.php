<?php
require_once ROOT . '/models/Comments.php';
require_once ROOT . '/models/News.php';
class CommentsController
{
    public function actionIndex()
    {
        $commentList = array();
        $commentList = Comments::getComm();
        require_once ROOT . '/view/comment/read.php';
    }
    public function actionAdd()
    {
        require_once ROOT . '/view/comment/add.php';
        Comments::saveComm($_POST);
    }
    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);

        }
        require_once ROOT . '/view/news/news.php';
        return true;
    }
}