<?php
session_start();
require_once ROOT . '/models/Users.php';
require_once ROOT . '/models/News.php';
class UsersController
{
    public function actionRegistration()
    {
        require_once ROOT . '/view/user/registration.php';
        Users::saveUser($_POST);
    }
    public function actionAuthorization()
    {
        require_once ROOT . '/view/user/authorization.php';
        Users::loginUser($_POST);
    }
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        require_once ROOT . '/view/user/personalArea.php';

    }

}