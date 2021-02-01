<?php

namespace Base;

class Application
{
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;//задается объект роут
    }

    public function run()
    {
        $view = new View();//создаем объект View
        $view->setTemplatePath(getcwd() . '/app/View');

        /** @var AbstractController $controller */

        try {
            $this->route->dispatch($_SERVER['REQUEST_URI']);
            $controller = $this->route->getController();
            $action = $this->route->getAction();
            $controller->setView($view);//созданный объект view, в котором передан путь к шаблону,
                                //передаем объект view в контроллер

            $session = new Session();
            $session->init();
            $controller->setSession($session);
            $controller->preDispatch();
            $result = $controller->$action();//контроллер запускает экшн
                                            //результат возвращает в переменную $result

            // ...

            echo $result;
        } catch (RedirectException $e) {
            header('Location: ' . $e->getUrl());
        } catch (ErrorException $e) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            echo 'Page not found';
        }

    }
}