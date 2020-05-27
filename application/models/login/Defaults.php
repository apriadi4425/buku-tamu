<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defaults extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->db2 = $this->load->database('sipp', TRUE);
	}
	function getSystemInfo(){
		try {
			if($this->db2=='xxx'){
                show_error('Database belum disetting.');
            }
			$this->db2->select('*');
			$this->db2->where('id >=', 61); 
			return $this->db2->get('sys_config');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getJenisPerkara($idalurperkara){
		if(empty($idalurperkara)) return '';
		try {
			$this->db2->where('id',$idalurperkara);
			$result = $this->db2->get('alur_perkara');
			if($result->num_rows>0){
				return $result->row()->nama;
			}else{
				return 'Alur Perkara Tidak Ditemukan';
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
	
	function getMenuPublic(){
		try {
			return $this->db2->query("
				SELECT m.id,m.parent_id,m.level,m.title,m.link,m.params
				FROM sys_menus AS m 
				LEFT OUTER JOIN `sys_menu_rule` AS s 
				ON m.`id` = s.`menuid` WHERE m.published=1 AND s.`ruleid` IS NULL 
				GROUP BY m.id,m.parent_id,m.ordering 
				ORDER BY m.ordering");
		} catch (Exception $e) {
			
		}
	}
	function getMenu($idgroup){
		try {
			if($idgroup==''){
				return $this->db2->query("
				SELECT m.id,m.parent_id,m.level,m.title,m.params 
				FROM sys_menus AS m 
				LEFT OUTER JOIN `sys_menu_rule` AS s 
				ON m.`id` = s.`menuid` WHERE m.published=1 AND s.`ruleid` IS NULL 
				GROUP BY m.id,m.parent_id,m.title,m.params,m.ordering 
				ORDER BY m.ordering");
			}else{
				return $this->db2->query("SELECT * FROM sys_menus WHERE id IN (SELECT ruleid FROM sys_group_rule WHERE groupid=$idgroup) ORDER BY LEVEL,ordering,parent_id;");
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getParentMenu($userid){
		try {
			if($userid==''){
				return $this->db2->query("
				SELECT m.id,m.parent_id,m.level,m.title,m.link,m.params,
				FROM sys_menus AS m 
				LEFT OUTER JOIN `sys_menu_rule` AS s 
				ON m.`id` = s.`menuid` WHERE m.published=1 AND s.`ruleid` IS NULL and level = 0
				GROUP BY m.id,m.parent_id,m.title,m.link,m.params,m.ordering 
				ORDER BY ,m.ordering");
			}else{
				return $this->db2->query("
					SELECT m.id,m.parent_id,m.title,m.link,m.params
					FROM sys_menus AS m 
					LEFT OUTER JOIN `sys_menu_rule` AS s ON m.`id` = s.`menuid` 
					WHERE m.published=1 AND ( s.`ruleid` IS NULL OR s.`ruleid` IN (SELECT ga.ruleid FROM `sys_group_rule` AS ga WHERE ga.groupid IN (SELECT ug.groupid FROM `sys_user_group` AS ug WHERE ug.userid=$userid)))
				 	GROUP BY m.id,m.parent_id,m.title,m.link,m.params,m.ordering ORDER BY m.ordering;");
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getChildMenu($userid,$parent_id){
		try {
			if($userid==''){
				return $this->db2->query("
				SELECT m.id,m.parent_id,m.level,m.title,m.language,m.link,m.params,m.target 
				FROM sys_menus AS m 
				LEFT OUTER JOIN `sys_menu_rule` AS s 
				ON m.`id` = s.`menuid` WHERE m.published=1 AND s.`ruleid` IS NULL AND parent_id=$parent_id AND level > 0
				GROUP BY m.id,m.parent_id,m.title,m.language,m.link,m.params,m.target,m.lft,m.ordering 
				ORDER BY m.lft,m.ordering");
			}else{
				return $this->db2->query("
					SELECT m.id,m.parent_id,m.title,m.language,m.link,m.params,m.target 
					FROM sys_menus AS m 
					LEFT OUTER JOIN `sys_menu_rule` AS s 
					ON m.`id` = s.`menuid` 
					WHERE m.published=1 AND parent_id=$parent_id AND ( s.`ruleid` IS NULL OR s.`ruleid` IN (SELECT ga.ruleid FROM `sys_group_rule` AS ga WHERE ga.groupid IN (SELECT ug.groupid FROM `sys_user_group` AS ug WHERE ug.userid=$userid)))
					GROUP BY m.id,m.parent_id,m.title,m.language,m.link,m.params,m.target,m.lft,m.ordering 
					ORDER BY m.lft,m.ordering;
					");
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function is_logged_in(){
		try {
			$this->db2->where('userid',$this->session->userdata('userid'));
			$this->db2->where('session_id',$this->session->userdata('session_id'));
			$this->db2->where('host_address',$this->session->userdata('host_address'));
			$query = $this->db2->get('sys_user_online');
			if($query->num_rows()<1){
				redirect("logout");
			}
		} catch (Exception $e) {
		}
	}

	function get_update_status(){
		try {
			if ($this->db2->table_exists('updates')){
			   $this->db2->where('updated',0);
				$query = $this->db2->get('updates');
				if(!$query){
					redirect("logout");
				}else{
					return $query;
				}
			}else{
				return '';
			} 
		} catch (Exception $e) {
			return '';
		}
	}

	function get_update_queries(){
		try {
			if ($this->db2->table_exists('sys_queries')){
				$query = $this->db2->get('sys_queries');
				if(!$query){
					redirect("logout");
				}else{
					return $query;
				}
			}else{
				$sql="CREATE TABLE sys_queries (
								  id smallint(11) unsigned NOT NULL AUTO_INCREMENT,
								  params varchar(250) DEFAULT NULL,
								  PRIMARY KEY (id)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				$this->db2->query($sql);
				$query = $this->db2->get('sys_queries');
				if(!$query){
					redirect("logout");
				}else{
					return $query;
				}
			} 
		} catch (Exception $e) {
			return '';
		}
	}

	function run_query($query){
		try {
			$res=$this->db2->query($query);
			if($res){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	function getMenuAbout(){
		try {
			$sql=$this->db2->query("select * from sys_menus where parent_id=6006");
			return $sql;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>
