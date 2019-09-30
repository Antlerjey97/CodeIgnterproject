<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index() {
	}

	public function confirm_account() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->Admin_model->confirm_account($username, $password);
		if ($data == 0) {
			$this->load->view('admin/loginFalse.php');
			$this->load->view('admin/login_view');
		} else {
			$rank = (int) $data[0]['rank'];
			$fullname = $data[0]['fullname'];
			$account = array('username' => $username, 'password' => $password, 'rank' => $rank, 'fullname' => $fullname);
			$this->session->set_userdata($account);
			$this->load->view('admin/Thongke_view');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('rank');
		$this->session->unset_userdata('fullname');
		header('location:/shop/admin');
	}

	public function login() {
		$this->load->view('admin/login_view');
	}
	public function registration() {
		$rank = $this->session->userdata('rank');
		if ($rank != 0) {
			echo '
				<script type="text/javascript">
				alert("Bạn không có quyền tạo tài khoản admin!");
				location.href = "/shop/admin";
				</script>
			';

		} else {
			$this->load->view('admin/registrationAdmin_view');
		}
	}
	public function confirmRegistration() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$rank = $this->input->post('rank');
		$status = $this->input->post('status');
		if ($this->Admin_model->checkUser($username)) {
			$this->Admin_model->addAdmin($username, $password, $fullname, $email, $rank, $status);
			$this->load->view('admin/success');
		} else {
			$this->load->view('admin/exists');
			$this->load->view('admin/registrationAdmin_view');
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */