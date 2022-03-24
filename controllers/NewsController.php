<?php
require_once ROOT . '/models/News.php';
class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        require_once ROOT . '/view/news/index.php';
    }

    public function actionView($id)
    {

        if ($id) {
            $newsItem = News::getNewsItemById($id);

        }
        require_once ROOT . '/view/news/news.php';
        return true;
    }

    public function actionAdd()
    {
        require_once ROOT . '/view/news/addtask.php';
        News::addNews($_POST);
    }
    public function actionUser()
    {

    }
}