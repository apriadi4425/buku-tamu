<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validation_user extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->db2 = $this->load->database('sipp', TRUE);
	}
	function validate(){
		$this->db2->select('password,userid');
		$this->db2->where('username',$this->input->post('username'));
		$query = $this->db2->get('sys_users');
		$password = '';
		foreach ($query->result() as $row) {
			$password = $row->password;
			$userid = $row->userid;
		}
		$pass = $this->getPassword();
		if($pass!=false AND !empty($password)){
			if($pass===$password){
				$this->db2->select('*');
			    $this->db2->from('sys_users AS A');
			    $this->db2->join('sys_user_group AS B', 'A.userid = B.userid', 'left');
			    $this->db2->join('sys_groups AS C', 'B.groupid = C.groupid', 'left');
			    $this->db2->where('A.userid',$userid);
			    $result = $this->db2->get();
			    foreach ($result->result() as $row) {
			    	if($row->block){
			    		return FALSE;
			    	}
			    	if(!empty($row->user_expired)){
			    		if (strtotime($row->user_expired) < time()) {
			    			# user was expired
			    			return FALSE;
			    		}
			    	}
			    	# create user session data
			    	$data = array(
			    		'fullname' 		=> $row->fullname,
						'username' 		=> $row->username,
			    		'status' 		=> $row->name,
						'idgroup'		=> $row->groupid,
			    		'is_logged_in' 	=> TRUE
			    	);
			    	$this->session->set_userdata($data);
			    }
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function arr2md5($arrinput){
	    $hasil='';
	    foreach($arrinput as $val){
	        if($hasil==''){
	            $hasil=md5($val);
	        }
	        else {
	            $code=md5($val);
	            for($hit=0;$hit<min(array(strlen($code),strlen($hasil)));$hit++){
	                $hasil[$hit]=chr(ord($hasil[$hit]) ^ ord($code[$hit]));
	            }
	        }
	    }
	    return(md5($hasil));
	}
	
	function getPassword(){
  		$this->db2->where('username',$this->input->post('username'));
  		$query = $this->db2->get('sys_users');

  		if($query->result_id->num_rows ==1){
  			foreach ($query->result() as $row){
  				$pass = $this->arr2md5(array($row->code_activation, $this->input->post('password')));
		return $pass;
  			}
  		}else{
  			return false;
  		}  
	}

}
