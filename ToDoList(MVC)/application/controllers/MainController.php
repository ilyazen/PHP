<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {
public function indexAction() {
    $result = $this->model->getNotesAll();
    $vars = [
    'notes'=>$result,
    ];

    $this->view->render("Все заметки",$vars);
}

}