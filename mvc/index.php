<?php

require 'vendor/autoload.php';
require 'base/config.php';

ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL | E_NOTICE);

$route = new \Base\Route();//создается объект роутинга и добавляется в него роут
$route->add('/', \App\Controller\Login::class);//статический роутинг,
                                    //т. е. указано, какие роуты каким классам соответствуют

$route->add('/login/register', \App\Controller\Login::class, 'register');

$route->add('/blog', \App\Controller\Blog::class);
$route->add('/test', \App\Controller\Login::class, 'test');

$app = new \Base\Application($route);//объект с созданными роутами передается в Application
$app->run();