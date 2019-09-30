<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Cart_model');
	}

	public function index($offset=0){
		$quantity=5; // quantity product in 1 page
		$totalProduct=$this->Product_model->countProduct(); //get total product
		$sanpham=$this->Product_model->getProductByOffset($quantity,$offset); //get product by offset
		$danhmuc=$this->Category_model->get();
		$data=array('sanpham'=>$sanpham,'danhmuc'=>$danhmuc);
		$this->load->library('pagination');
		$config['base_url'] = '/shop/admin/Product/index';
		$config['total_rows'] = $totalProduct;
		$config['per_page'] = 5;
		$config['uri_segment'] = 0;
		$config['num_links'] = 1;
		$config['full_tag_open'] = '<div class="phantrang"><p>';
		$config['full_tag_close'] = '</p></div>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';	
		$this->pagination->initialize($config);	
		$this->load->view('admin/listProduct_view', $data, FALSE);
	}
	
	public function addProduct(){
		$data=$this->Category_model->get();
		$data=array('danhmuc'=>$data);
		$this->load->view('admin/addProduct_view',$data);
	}

	public function addNewProduct(){
		$config['upload_path'] = './image/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());

		}
		else{
			$data =  $this->upload->data();
		}
		$image=$data['file_name'];
		$data=array('name_product'=>$this->input->post('name_product'),
			'id_category'=>$this->input->post('id_category'),
			'label'=>$this->input->post('label'),
			'image'=>$image,
			'price'=>$this->input->post('price'),
			'price_sales'=>$this->input->post('price_sales'),
			'description'=>$this->input->post('description'),
			'quantity'=>$this->input->post('quantity'),
			'status'=>$this->input->post('status'),
			'note_km'=>$this->input->post('note_km')
		);
		if($this->Product_model->insert($data)){
		$this->load->view('admin/success');
		}else{
			$this->load->view('admin/false_view');
		}

	}
	
	public function edit($id){ 
		$danhmuc=$this->Category_model->get();	
		$sanpham=$this->Product_model->get($id);		
		$data=array('sanpham'=>$sanpham,'danhmuc'=>$danhmuc);
		$this->load->view('admin/editProductById_view', $data, FALSE);
	}
	
	public function editById($id) { // sửa dữ liệu bằng id
		$image= $_FILES['image']['name'];
		if ($image==NULL) {
			$image=$this->input->post('image_old');
		}else{
			$config['upload_path'] = './image/product/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '10000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				$image=$data['file_name'];
			}
		 } //end if
		 $data=array('name_product'=>$this->input->post('name_product'),
		 	'id_category'=>$this->input->post('id_category'),
		 	'label'=>$this->input->post('label'),
		 	'image'=>$image,
		 	'price'=>$this->input->post('price'),
		 	'price_sales'=>$this->input->post('price_sales'),
		 	'description'=>$this->input->post('description'),
		 	'quantity'=>$this->input->post('quantity'),
		 	'status'=>$this->input->post('status'),
		 	'note_km'=>$this->input->post('note_km')
		 );
		 if($this->Product_model->update($data,$id)){
			$this->load->view('admin/success');
		}else{
			$this->load->view('admin/false_view');
		}
		}
		
		public function delete($id){	// xóa sản phẩm theo id
	
			if($this->Product_model->delete($id)){
			$this->load->view('admin/success');
			}else{
			$this->load->view('admin/false_view');
			}
		}

		public function Bill(){
			$data=$this->Cart_model->getDataBill();
			$customer=$this->Cart_model->getInforCustomer();
			$data=array('data'=>$data,'customer'=>$customer);
			$this->load->view('admin/Bill_view',$data);
		}

		public function billProduct($id){
			$data=$this->Cart_model->getDataBillProduct($id);
			$data=array('data'=>$data);
			$this->load->view('admin/billProduct_view',$data);
		}

		public function deleteBill(){	
			$id=$this->input->post('id');
			$this->Cart_model->deleteBill($id);
			$data=$this->Cart_model->getInforCustomer();
			if (count($data)==0) {
			echo "empty";
			}

		}
		
		public function updateStatusBill(){
			$status=$this->input->post('status');
			$id=$this->input->post('id');
			$this->Cart_model->updateStatusBill($id,$status);

		}
	}

	/* End of file Product.php */
/* Location: ./application/controllers/Product.php */