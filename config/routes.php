<?php
return array(
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',
    'registration' => 'users/registration',
    'authorization' => 'users/authorization',
    'add' => 'news/add',
    'comment/([0-9]+)' => 'comments/view/$1',
    'comment' => 'comments/add',
    'userAdd' => 'comments/add',
    'user' => 'users/index',
    'com/([0-9]+)' => 'comments/index'
);