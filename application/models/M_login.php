<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function detail_user($table,$where){		
		$query = $this->db->get_where($table,$where);
		$query = $query->result_array();
		return $query;
	}
}