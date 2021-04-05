<?php

namespace application\core;

use application\core\View;
use application\core\Controller;
use application\controllers;


class Router {
    // хранит путь(URI) =>[
    //controller=>''
    //action=>''
    //]
    protected $routes = [];
    // хранит найденые controller и action
    protected $params = [];
    
    public function __construct() {
        //подключаем маршруты
        $arr = require 'application/config/routes.php';
        // преобразуем полученные маршруты
        foreach ($arr as $key => $val) {
            $this->add($key,$val);

        }

    }
    // приводим к regexp
    public function add($route, $params) {
        // ключи(путь URL в массиве $routes) приводим к виду regexp
        $route = '~'.$route.'~';
        $this->routes[$route] = $params;
    }
    // проверяет есть ли маршрут
    public function match() {
        // получаем текущий URL и удаляем / в начале
        $url = trim($_SERVER['REQUEST_URI'],'/');

        //перебираем массив маршрутов
        foreach ($this->routes as $route => $params) {

            //проверям соответствие url и маршрутов
            if(preg_match($route,$url,$matches)){
                $this->params = $params;
                // есть пути
                return true;
            }
        }
        // нет пути
        return false;


    }
    // init
    public function run(){
       if($this->match()){

           // подключаем контроллер
           //путь до контроллера
            $pathToClass = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            $pathToController = dirname(__DIR__) .'\controllers\\'.ucfirst($this->params['controller']).'Controller'.'.php';


            if(file_exists($pathToController)) {
                include_once($pathToController);
                //вызваем класс контроллер с текущими параметрами
                $controller = new $pathToClass($this->params);
                $action = $this->params['action']."Action";
                $controller -> $action();
            } else {
                //вызов статичного метода с ошибкой
                View::errorCode(404);
            }
       };
    }


}