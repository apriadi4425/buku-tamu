<?php
class m_data extends CI_Model{

	public function get($table){
		return $this->db->get($table);
	}
	public function where($where){
		return $this->db->where($where);
	}
	public function like($like){
		return $this->db->like($like);
	}
	public function order_by($parameter,$value){
		return $this->db->order_by($parameter,$value);
	}
	public function select($field){
		return $this->db->select($field);
	}

	public function insert($table,$data){
		return $this->db->insert($table,$data);
	}

	public function update($table,$data){
		return $this->db->update($table,$data);
	}
	public function delete(){
		return $this->db->delete($table);
	}
	public function join($table,$on,$param = null){
		if($param == null){
			return $this->join($table,$on);
		}else{
			return $this->join($table,$on,$param);
		}

	}
	public function from($table){
		return $this->db->from($table);
	}

}
