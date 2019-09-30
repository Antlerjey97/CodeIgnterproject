<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Member_model extends CI_Model {

	public $variable;

	public function __construct() {
		parent::__construct();

	}
	public function checkEmail($email) {
		$this->db->select('*');
		$this->db->where('email', $email);
		$data = $this->db->get('member')->result_array();
		if (count($data) == 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insertMember($email, $password, $fullname) {
		$data = array('fullname' => $fullname, 'email' => $email, 'password' => $password);
		$this->db->insert('member', $data);
	}

	public function confirmMember($email, $password) {
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$data = $this->db->get('member')->result_array();
		$data = count($data) > 0 ? $data : 0;
		return $data;
	}

}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */