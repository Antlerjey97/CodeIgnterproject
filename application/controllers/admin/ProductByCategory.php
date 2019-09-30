<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductByCategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
	}

	public function index()	{
	}
	public function getDataByNameCategory($id_category,$indexPage) 	{ 	// get product by category and page
		$totalProduct=$this->Product_model->totalData($id_category);	 // quantity product by category
		$quantity=5; // quantity product in 1 page
		$numberPage=ceil($totalProduct/$quantity); // total page
		$offset=0;
		$sanpham=$this->Product_model->getProductByOffsetCategory($quantity,$offset,$id_category);
		$danhmuc=$this->Category_model->get();
		$data=array('sanpham'=>$sanpham,'danhmuc'=>$danhmuc,"sotrang"=>$numberPage);
		$this->load->view('admin/listProductByCategory_view', $data, FALSE);
	}

	public function showProductByAjax()	{
		$id_category=$this->input->post('dl');
		$quantity=5;
		$offset=0;
		$danhmuc=$this->Category_model->get();
		if ($id_category==0) {
			$totalProduct=$this->Product_model->countProduct();
			$numberPage=ceil($totalProduct/$quantity);
			$sanpham=$this->Product_model->getProductByOffset($quantity,$offset);
		}else{
			$totalProduct=$this->Product_model->totalData($id_category);
			$numberPage=ceil($totalProduct/$quantity);
			$offset=0;
			$sanpham=$this->Product_model->getProductByOffsetCategory($quantity,$offset,$id_category);
		}
		$data=array('sanpham'=>$sanpham,'danhmuc'=>$danhmuc,"sotrang"=>$numberPage,'DM'=>$id_category);
		$this->load->view('admin/showProductByAjax_view',$data);
	}

	public function getDataByPage($id_category,$page){
		$quantity=5;
		if ($id_category==0) {
			$totalProduct=$this->Product_model->countProduct();
			$numberPage=ceil($totalProduct/$quantity);
			$offset=($page-1)*$quantity;
			$sanpham=$this->Product_model->getProductByOffset($quantity,$offset);
		}else{
			$totalProduct=$this->Product_model->totalData($id_category);
			$numberPage=ceil($totalProduct/$quantity);
			$offset=($page-1)*$quantity;
			$sanpham=$this->Product_model->getProductByOffsetCategory($quantity,$offset,$id_category);
		}
		$danhmuc=$this->Category_model->get();
		$data=array('sanpham'=>$sanpham,'danhmuc'=>$danhmuc,"sotrang"=>$numberPage,'DM'=>$id_category);
		$this->load->view('admin/listProductByCategory_view', $data, FALSE);
	}

}

/* End of file ProductByCategory.php */
/* Location: ./application/controllers/ProductByCategory.php */