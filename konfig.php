<?php


class Database {
	public $host_db1,$user_db1, $pass_db1,$host_db2,$user_db2, $pass_db2,$db1,$db2;

	public function get_database($host_db1, $user_db1, $pass_db1,$host_db2, $user_db2, $pass_db2, $db1, $db2){
		$this->host_db1 = $host_db1;
		$this->user_db1 = $user_db1;
		$this->pass_db1 = $pass_db1;
		
		$this->host_db2 = $host_db2;
		$this->user_db2 = $user_db2;
		$this->pass_db2 = $pass_db2;
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


