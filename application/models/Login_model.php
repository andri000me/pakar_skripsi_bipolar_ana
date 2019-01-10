<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	function _construct() {
		parent::_construct();
	}

	function login($username, $password){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user', $username);
		$this->db->where('password', $password);
			// $this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}
}