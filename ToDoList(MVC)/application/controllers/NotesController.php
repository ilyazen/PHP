<?php


namespace application\controllers;

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class NotesController extends Controller
{
    public function showAction() {
        $id = $_GET['id'];
        $result = $this->model->getNote($id);
        $vars = [
            'notes'=>$result,
        ];
        $title = $result[0]['title'];
        $this->view->render($title,$vars);
    }

    public function doneAction() {
        $id = $_GET['id'];
        $this->model->done($id);
        $this->view->redirect('/ToDoList');
    }
    public function deleteAction() {
        $id = $_GET['id'];
        $this->model->delete($id);
        $this->view->redirect('/ToDoList');
    }
    public function addAction() {
        $this->view->render("Добавить заметку");
        if(!empty($_POST)) {
            $this->model->add($_POST);
            $this->view->redirect('/ToDoList');
        }
    }

}