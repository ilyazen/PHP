<?php


namespace application\models;
use application\core\Model;

class Notes extends Model
{
    public function getNote($id) {
        $result = $this->db->row("SELECT id,title, prev_descr, descr, status FROM notes WHERE id = {$id}");
        return $result;
    }
    public function done($id) {
        $this->db->update("UPDATE notes SET status = 'Завершено' WHERE notes.id = {$id}");
    }
    public function delete($id) {
        $this->db->delete("DELETE FROM notes WHERE notes.id = {$id}");
    }
    public function add($params) {
        extract ($params);
        $this->db->add(
            "INSERT INTO notes
    (title, prev_descr, descr)
            VALUES
    ('{$title}', '{$prev_descr}', '{$descr}') ");
    }

}