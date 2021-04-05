<?php

namespace application\lib;

use PDO;

class Db {
    protected $db;

    public function __construct()
    {

        $config = require 'application/config/db.php';
        // подключение
        $dsn = "mysql:host={$config['host']};dbname={$config['name']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);

    }
    //функция запрос
    public function query($sql,$params = []) {
        // валидация запроса
        $stmt = $this->db->prepare($sql);
        if(!empty($params)) {
        foreach ($params as $key => $val) {
            $stmt->bindValue(':'.$key,$val);
        }
        }
        $stmt->execute();
        return $stmt;

    }
    //fetch
    public function row($sql,$params = []) {
        return $this->query($sql,$params)->fetchAll(PDO::FETCH_ASSOC);

    }
    public function column($sql,$params = []) {
        return $this->query($sql,$params)->fetchColumn();
    }
    public function update($sql) {
        $this->query($sql);
    }
    public function delete($sql) {
        $this->query($sql);
    }
    public function add($sql,$params = []) {
        $this->query($sql,$params);
    }



}