<?php

require 'application/lib/Dev.php';

use application\core\Router;


//автозагрузка классов
spl_autoload_register(function($class) {
    //валидный путь до класса
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$router = new Router;
$router->run();