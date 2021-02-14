<?php

namespace Base;

class Route
{
    private $routes;
    private $controller;
    private $action;

    public function add(string $route, $controllerName, $actionName = 'index')//добавляет класс $route
                                //во внутренний массив $routes. Передается имя контроллера и имя экшна
    {
        $this->routes[$route] = [$controllerName, $actionName];
    }

    public function auto($uri)//пытается найти подходящий контроллер и подходящий экшн динамически
                                    //для создания автоматического роута
    {
        $parts = explode('/', $uri);//переданный uri разделяется на части
        if (empty($parts[1])) {
            return false;
        }
        $controllerName = $parts[1];//первая часть образует имя контроллера
        $actionName = 'index';//вторая часть образует имя экшна, по умолчанию это index
        if (isset($parts[2])) {
            $actionName = $parts[2];
        }
        $controllerClassName = 'App\\Controller\\' . ucfirst(strtolower($controllerName));
        if (!class_exists($controllerClassName)) {
            return false;
        }

        $this->controller = new $controllerClassName();
        if (!method_exists($this->controller, $actionName)) {
            return false;
        }

        $this->action = $actionName;
        return true;
    }

    /**
     * @param string $uri
     * @throws ErrorException
     */
    public function dispatch(string $uri)//преобразует запрошенный uri в объект контроллера
                                            //и в название экшна, который будет вызван
    {
        $parsed = parse_url($uri);
        $uri = $parsed['path'];

        if (isset($this->routes[$uri])) {//статический роутинг, т. е. ищем внутри массива routes
            $this->controller = new $this->routes[$uri][0];
            $this->action = $this->routes[$uri][1];
            return;
        }

        if (!$this->auto($uri)) {//автоматический роут
            throw new ErrorException();
        }
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }
}