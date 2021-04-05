<?php

namespace application\core;

class View {
    public $route;
    // путь к View(content)
    public $path;
    // шаблон
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        // путь по которому находиться маршрут
        $this->path = $route['controller'].'/'.$route['action'];

    }
    //загружает шаблон и view

    /**
     * @param $title
     * @param array $vars - переменные необходимые для view
     */
    public function render($title,$vars = []) {
        extract($vars);
        // application\views - путь к папке views
        //копируем в буфер content и подключаем

        if(file_exists('application/views/'.$this->path .'.php')) {
            ob_start();
            require 'application/views/'.$this->path .'.php';
            $content = ob_get_clean();
            // подключаем layout
            require 'application/views/layouts/' .$this->layout .'.php';
        }


    }
    // подключение страниц ошибок
    public static function errorCode($code) {
        http_response_code($code);
        require 'application/views/errors/'.$code.'php';
        exit;

    }
    public function redirect($url) {
        header("location: $url");
        exit;
    }
    public function message($status,$message) {
        exit(json_encode(['status' => $status, 'message'=>$message]));
    }
    public function loaction($url) {
        exit(json_encode(['url' => $url]));
    }


}	