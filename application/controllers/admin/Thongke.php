<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thongke extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	 $this->load->view('admin/Thongke_view');
	}

}

/* End of file Thongke.php */
/* Location: ./application/controllers/Thongke.php */