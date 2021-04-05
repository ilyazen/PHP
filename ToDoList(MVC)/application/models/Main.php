<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getNotesAll() {
		$result = $this->db->row('SELECT `id`, `title`, `prev_descr`, `descr`, `status` FROM `notes` WHERE 1 ORDER BY `notes`.`status` ASC ');
		return $result;
	}

}