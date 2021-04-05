<?php

namespace application\core;

use application\core\View;
use application\core\Model;
use application\models;

abstract class Controller {
    // хранит текущий controller & action
    public $route;

    public $view;
    public $model;

    public function __construct($route) {
       $this->route = $route;
       // подключаем acl
//       $this->checkAcl();
       // во view передаем маршруты(route)
       $this->view = new View($route);
       $this->model = $this->loadModel($route['controller']);
    }

    /**
     * @param $name - имя модели
     * Подключение модели
     */
    public function loadModel($name) {

        $pathToModel = dirname(__DIR__) .'\models\\'.ucfirst($name).'.php';
        $pathToClass = 'application\models\\'.ucfirst($name);
        if(file_exists($pathToModel)) {
            include_once($pathToModel);
            //вызваем модель
            $model = new $pathToClass;
            return $model;
        }


    }
//    public function checkAcl() {
//        $pathToAcl = 'application/acl/'.$this->route['controller'].'.php';
//        if(file_exists($pathToAcl)) {
//            $acl = require 'application/acl/' . $this->route['controller'] . '.php';
//            return $acl;
//        }
//
//    }



}