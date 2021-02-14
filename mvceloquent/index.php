<?php

require 'vendor/autoload.php';
require 'base/config.php';
require 'bootstrap.php';

ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL | E_NOTICE);

$route = new \Base\Route();//создается объект роутинга и добавляется в него роут
$route->add('/', \App\Controller\Login::class);//статический роутинг,
                                    //т. е. указано, какие роуты каким классам соответствуют
                                    //что, где и как выводить

$route->add('/login/register', \App\Controller\Login::class, 'register');
//$route->add('/login/login', \App\Controller\Login::class, 'auth');
$route->add('/blog', \App\Controller\Blog::class);
//$route->add('/test', \App\Controller\Login::class, 'test');
$route->add('/admin/users', \App\Controller\Admin\Users::class);
$route->add('/admin/saveUser', \App\Controller\Admin\Users::class, 'saveUser');
$route->add('/admin/deleteUser', \App\Controller\Admin\Users::class, 'deleteUser');
$route->add('/admin/addUser', \App\Controller\Admin\Users::class, 'addUser');

//$ms = \App\Model\Eloquent\Message::getList(10);
//foreach ($ms as $m) {
    ///** @var \App\Model\Eloquent\Message $m */
   // echo '<pre>';
   // var_dump($m->author->getId());
//}
//die;

$app = new \Base\Application($route);//объект с созданными роутами передается в Application
$app->run();