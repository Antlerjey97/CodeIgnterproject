<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index(){
		$data=$this->Category_model->get();
		$total=array();
		foreach ($data as $key => $value) {
			array_push($total, $value['id_category']);
		}
		$sl=array();
		for ($i=0; $i <count($total) ; $i++) { //get total quantity
			$sl[$i]=$this->Category_model->totalProductByCategory($total[$i]);
		}		
		$data=array('data'=>$data,'sl'=>$sl);		
		$this->load->view('admin/category_view',$data);
	}

	public function add(){
		$data=array('name_category'=>$this->input->post('name_category'));
		if ($this->Category_model->insert($data)) {
			header('location:/shop/admin/Category');
		}else{
			echo "Thêm thất bại";
		}
	}

	public function editCategory($id){
		$data=array('name_category'=>$this->input->post('name_category'));
		if ($this->Category_model->updateCategory($data,$id)){
			header('location:/shop/admin/Category');
		}else{
			echo "Lỗi";
		}
	}

	public function delete( $id = NULL ){
		if ($this->Category_model->delete($id)) {
			header('location:/shop/admin/Category');
		}else{
			echo "Xóa thất bại";
		}
		$this->load->view('admin/false_view');

	}

	public function sua($id){
		$data=$this->Category_model->get($id);
		$data=array('data'=>$data);
		$this->load->view('admin/edit_category', $data, FALSE);
	}

	public function addCategory(){
		$this->load->view('admin/add_Category_view');
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
