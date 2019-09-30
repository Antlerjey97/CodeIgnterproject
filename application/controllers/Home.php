<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		$this->load->model('Member_model');
	}

	public function index() {
		$category = $this->Category_model->get();
		$id = array();
		for ($i = 0; $i < count($category); $i++) {
			$id[$i] = $category[$i]['id_category'];
		}
		$phone = $this->Product_model->getProductByCategory($id[0]); //get list product by category
		$tablet = $this->Product_model->getProductByCategory($id[1]);
		$laptop = $this->Product_model->getProductByCategory($id[2]);
		$phukien = $this->Product_model->getProductByCategory($id[3]);
		$new = $this->Product_model->getProductByNew();
		$data = array('phone' => $phone, 'tablet' => $tablet, 'laptop' => $laptop, 'phukien' => $phukien, 'new' => $new);
		$this->load->view('Home_view', $data, FALSE);
	}

	public function showProduct($id) {
		// get by category
		$data = $this->Product_model->getLoadMore($id, 0);
		$data = array('products' => $data);
		$this->load->view('showProduct_view', $data);
	}

	public function loadMore() {
		// get data by ajax
		$id_category = $this->input->post('idCartegory');
		$offset = $this->input->post('offset');
		$data = $this->Product_model->getLoadMore($id_category, $offset);
		if (count($data) == 0) {
			echo "NULL";
		} else {
			$data = array('products' => $data);
			$this->load->view('loadMore_view', $data, FALSE);
		}
	}

	public function singleProduct($id_category, $id) {
		// detail product
		$data = $this->Product_model->getSingleProduct($id, $id_category);
		$sp_same = $this->Product_model->getProductSame($id, $id_category);
		$data = array('data' => $data, 'spSame' => $sp_same);
		$this->load->view('singleProduct_view', $data, FALSE);
	}
	public function huy() {
		$this->session->unset_userdata('cart');
	}

	public function addToCart() {
		$id = $this->input->post('id');
		$slAdd = $this->input->post('sl');
		if (isset($this->session->userdata['cart'][$id])) {
			$quantityInCart = $this->session->userdata['cart'][$id][0];
			$all = $quantityInCart + $slAdd;
			if ($all > 5) {
				echo "limit";
			} else {
				if ($this->Cart_model->checkQuantity($id, $all)) {
					$this->session->userdata['cart'][$id][0] = $all;
					echo "done";
				} else {
					echo "expired";
				}
			}
		} else {
			if ($this->Cart_model->checkQuantity($id, $slAdd)) {
				$temp = array($slAdd + 0, 0);
				$this->session->userdata['cart'][$id] = $temp;
				echo "done";
			} else {
				echo "expired";
			}
		}
	}
	public function editQuantity() {
		$id = $this->input->post('id');
		$sl = $this->session->userdata['cart'][$id][0];
		$sl--;
		$this->session->userdata['cart'][$id][0] = $sl;
	}

	public function Cart() {
		if (isset($this->session->userdata['cart'])) {
			$cart = $this->session->userdata['cart'];
			$where = array();
			foreach ($cart as $key => $value) {
				array_push($where, $key);
			}
			$data = $this->Product_model->getProductByCart($where);
			$data = array('data' => $data);
			$this->load->view('cart_view', $data);
		} else {
			$data = NULL;
			$data = array('data' => $data);
			$this->load->view('cart_view', $data, FALSE);
		}
	}
	public function removeProductInCart() {
		$id = $this->input->post('id');
		unset($this->session->userdata['cart'][$id]);
		$cart = $this->session->userdata['cart'];
		if (count($cart) == 0) {
			$this->session->unset_userdata('cart');
		}

	}
	public function changeStatusAll() {
		$status = $this->input->post('status');
		$status = (int) $status;
		foreach ($this->session->userdata['cart'] as $key => &$value) {
			$value[1] = $status;
		}
	}
	public function changeStatusSingle() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$status = (int) $status;
		foreach ($this->session->userdata['cart'] as $key => &$value) {
			if ($key == $id) {
				$value[1] = $status;
			}
		}
	}
	public function verify() {
		$cart = $this->session->userdata['cart'];
		$val = 0;
		foreach ($cart as $key => $value) {
			if ($value[1]) {
				$val++;
				break;
			}
		}
		$status = ($val > 0) ? 'done' : 'fail';
		echo $status;
	}
	public function addBill() {
		$sex = $this->input->post('sex');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$note = $this->input->post('note');
		$idForm = $this->Cart_model->insertForm($sex, $name, $phone, $email, $address, $note);
		$cart = $this->session->userdata['cart'];

		if ($this->Cart_model->insertForm($sex, $name, $phone, $email, $address, $note)) {
                        $this->load->view('thanhcong');
                        // gửi mail cho chủ nhà hàng
                        include "mail/PHPMailerAutoload.php";
                        $mail = new PHPMailer(true);
                        try {
                                $mail->isSMTP();
                                $mail->Host       = 'smtp.gmail.com';
                                $mail->SMTPAuth   = true;
                                // set server gmail
                                $mail->Username   = 'doducan.ltu14@gmail.com';
                                $mail->Password   = 'vzqyzigvocdfabny';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port       = 587;
                                $mail->setFrom('toidicodedao@gmail.com', 'Thông báo');
                                $mail->addAddress("20158001@student.hust.edu.vn");
                                $mail->isHTML(true);
                                $mail->Subject = "Thông báo vừa có khách đặt hàng tên là: ".$name."<br>  Số điện thoại :".$phone;
                                $mail->Body    = "Tên khách hàng :". $name."<br>  Email khách hàng :".$email."<br>  Số điện thoại :".$phone."<br> địa chi:".$address." <br> Ghi chú :".$note;
                                $mail->CharSet = "utf-8";
                                $mail->send();
                                
                                
                                
                        }
                        catch (Exception $e) {
                                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                        
                        
                        
                        
                } else {
                        $this->load->view('thatbai');
                }

		foreach ($cart as $key => $value) {
			if ($value[1]) {
				$this->Cart_model->insertBill($idForm, $key, $value[0]);
				$sl = $this->Cart_model->getQuantityById($key);
				$sl = $sl - $value[0];
				$this->Cart_model->updateSL($key, $sl);
				unset($this->session->userdata['cart'][$key]);
			}
		}
		$cart = $this->session->userdata['cart'];
		if (count($cart) == 0) {
			$this->session->unset_userdata('cart');
		}
	}
	public function Timkiem() {
		$keySearch = $this->input->post('keySearch');
		$data = $this->Product_model->Timkiem($keySearch);
		$data = array('data' => $data, 'keySearch' => $keySearch);
		$this->load->view('resultSearch', $data);
	}

	public function TimkiemAjax() {
		$key = $this->input->post('key');
		$data = $this->Product_model->TimkiemAjax($key);
		$data = array('data' => $data);
		$this->load->view('seachAjax_view', $data, FALSE);
	}

	public function dangKy() {
		$this->load->view('dangKy_view');
	}
	public function xacnhanDK() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$fullname = $this->input->post('fullname');
		if ($this->Member_model->checkEmail($email)) {
			$this->Member_model->insertMember($email, $password, $fullname);
			echo "success";
		} else {
			echo "isset";
		}
	}
	public function createSessionMember() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$fullname = $this->input->post('fullname');
		$account = array('fullname' => $fullname, 'password' => $password, 'email' => $email);
		$this->session->set_userdata($account);
	}
	public function huySessionMember() {
		$account = array('fullname', 'password', 'email');
		$this->session->unset_userdata($account);
		header('location:/shop/Home');
	}

	public function loginMember() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		if ($this->Member_model->confirmMember($email, $password) == 0) {
			echo "notfound";
		} else {
			$data = $this->Member_model->confirmMember($email, $password);
			$email = $data[0]['email'];
			$password = md5($data[0]['password']);
			$fullname = $data[0]['fullname'];
			$account = array('fullname' => $fullname, 'password' => $password, 'email' => $email);
			$this->session->set_userdata($account);
			echo "success";
		}

	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */