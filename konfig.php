<?php


class Database {
	public $host_db,$user_db, $pass_db,$db1,$db2;

	public function get_database($host_db, $user_db, $pass_db, $db1, $db2){
		$this->host_db = $host_db;
		$this->user_db = $user_db;
		$this->pass_db = $pass_db;
		$this->db1 = $db1;
		$this->db2 = $db2;
	}
	public function get_json(){
		$file = 'database.txt';

		if (!is_file($file) xor !is_readable($file)) {
			trigger_error("File Not readable");
		}
		$data = file_get_contents($file);
		$data = json_decode($data, true);
		return $data;
	}
}


