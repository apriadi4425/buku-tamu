<?php
class M_data_sipp extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->db2 = $this->load->database('sipp', TRUE);
	}
	public function get($table){
		return $this->db2->get($table);
	}

	public function where($where){
		return $this->db2->where($where);
	}
	public function like($like){
		return $this->db2->like($like);
	}
	public function order_by($parameter,$value){
		return $this->db2->order_by($parameter,$value);
	}

	public function select($field){
		return $this->db2->select($field);
	}

}
