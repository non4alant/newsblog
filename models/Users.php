<?php
session_start();
class Users
{
    public static function saveUser($post)
    {
        $db = Db::getConnection();

        $email = $post['email'];

        $params = [
            'id' => null,
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => md5($post['password']),
        ];

        $query = $db->prepare("INSERT INTO users (id, name, email, password) VALUES (:id, :name, :email, :password)");

        if ($post) {
            if (empty($post['name']) || empty($post['email']) || empty($post['password'])) {
                $_SESSION['result'] = 'Не все данные заполнены';
                header("Location: http://work2/registration");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['result'] = 'Почта указана неверно';
                header("Location: http://work2/registration");
                exit;
            }

            if ($post['password'] != $post['password-repeat']) {
                $_SESSION['result'] = 'Повторный пароль введен не верно!';
                header("Location: http://work2/registration");
                exit;
            }
        }

        $query->execute($params);
        $_SESSION['name'] = $post['email'];
        if (isset($_SESSION['name'])){
            header("Location: http://work2/user");
            exit;
        }
    }
    public static function loginUser($post)
    {
        $db = Db::getConnection();
        if (!empty($post)){
            $params = [
                'login' => $post['login'],
                'password' => md5($post['password-login']),
            ];
            $query = $db->prepare("SELECT email, password FROM users WHERE (email = :login
                                             AND password = :password)");
            $query->execute($params);
            $user = $query->fetch(PDO::FETCH_LAZY);
            if ($user){
                if (count($user) == 1){
                    $_SESSION['name'] = $user['email'];
                    header("Location: http://work2/user");
                    exit;
                }
            }else{
                $_SESSION['result'] = 'Данные указаны не верно!';
                header("Location: http://work2/authorization");
                exit();
            }
        }
    }

}