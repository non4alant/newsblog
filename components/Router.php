<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    // метод возвращает строку
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    //принимает управление от фронт контроллера
    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();
        // проверить наличие такого запросу в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // сравниваем $uriPattern и $uri;
            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //определить какой controller and action обрабатывают запрос



                $segment = explode('/', $internalRoute);
                $controllerName = array_shift($segment) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segment));

                $parameters = $segment;


                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)){
                    include_once ($controllerFile);
                }

                //Создать объект, вызвать метод (т.е. action);
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null){
                    break;
                }
            }
        }
    }
}