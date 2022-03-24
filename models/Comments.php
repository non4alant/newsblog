<?php
session_start();

class Comments
{
    public static function saveComm($post)
    {
        $db = Db::getConnection();

        // пользователь, который написал коммит
        $email = [
            'email' => $_SESSION['name']
        ];
        $user = $db->prepare("SELECT id FROM users WHERE email = :email");
        $user->execute($email);
        $user = $user->fetchColumn();

        // id новости к которой пишется комментарий
        $news_id = [
            'news' => $_SESSION['id'],
        ];

        $news = $db->prepare("SELECT id FROM news WHERE id = :news");
        $news->execute($news_id);
        $news = $news->fetchColumn();

        // добавление комментария к новости
        if ($post){
            $params = [
                'user' => $user,
                'news' => $news,
                'text' => $post['comm'],
            ];

            $comment = $db->prepare("INSERT INTO comments (id, id_user, id_news, text) VALUES (null, :user, 
                                                          :news, :text)");
            if (empty($post['comm'])) {
                $_SESSION['result_comm'] = 'Пустой комментарий недопустим';
                header("Location: http://work2/comment/");
                exit();
            }
            $comment = $comment->execute($params);
            if ($comment){
                header("Location:http://work2/comment/" . $_SESSION['id']);
                exit();
            }
        }
    }
    public static function getComm()
    {
        $db = Db::getConnection();
        $commentList = array();

        $id_news = [
          'news' => $_SESSION['id'],
        ];

        $query = $db->prepare("SELECT * FROM comments WHERE id_news = :news");
        $query->execute($id_news);
        $i = 1;
        while ($row = $query->fetch()){
            $commentList[$i]['id'] = $row['id'];
            $commentList[$i]['id_user'] = $row['id_user'];
            $commentList[$i]['id_news'] = $row['id_news'];
            $commentList[$i]['text'] = $row['text'];
            $i++;
        }
        return $commentList;
    }
}