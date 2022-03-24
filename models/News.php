<?php
session_start();

class News
{
    public static function getNewsItemById($id){
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM news WHERE id=" . $id);

            $newsItem = $result->fetch();
            $params = [
                'id' => $newsItem['id_user']
            ];
            $result = $db -> prepare("SELECT email FROM users WHERE id = :id");
            $result->execute($params);
            $result->fetchColumn();

            return $newsItem;
        }
    }

    public static function getNewsList()
    {
        $db = Db::getConnection();
        $taskList = array();

        $result = $db->query('SELECT * '
            . 'FROM news '
            . 'ORDER BY id DESC ');
        $i = 1;

        while ($row = $result->fetch()) {
            // вывод и замена id на имя опубликовашего запись
            $params = [
                'name' => $row['id_user'],
            ];
            $taskList[$i]['id_user'] = $db->prepare("SELECT email FROM users WHERE `id` = :name");
            $taskList[$i]['id_user']->execute($params);
            $taskList[$i]['id_user'] = $taskList[$i]['id_user']->fetchColumn();

            // вывод остальных данных о новости
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['text'] = $row['text'];
            $i++;
        }

        return $taskList;
    }

    public static function addNews($post)
    {
        $db = Db::getConnection();
        $email = [
            'email' => $_SESSION['name'],
        ]
        ;

        $id_user = $db->prepare("SELECT id FROM users WHERE `email` = :email");
        $id_user->execute($email);

        $id = $id_user->fetchColumn();

        $params = [
            'id_user' => $id,
            'title' => $post['title'],
            'text' => $post['text'],
        ];

        $query = $db->prepare("INSERT INTO `news` (`id`, `id_user`, `title`, `text`) VALUES (NULL, :id_user, :title, :text);");
        if ($post){
            if (empty($post['title']) || empty($post['text'])) {
                $_SESSION['result_news'] = 'Не все поля заполнены';
                header("Location: http://work2/add");
                exit();
            }
        }
        $newsAdd = $query->execute($params);
        if ($newsAdd) {
            header("Location: http://work2/user");
            exit();
        }
    }
}