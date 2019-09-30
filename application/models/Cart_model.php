<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public $variable;

	public function __construct(){
		parent::__construct();
		
	} 

	public function checkQuantityProduct($id) {//check quantity product in store	
		$this->db->select('quantity');
		$this->db->where('id_product', $id);
		$data=$this->db->get('product')->result_array();
		return $data[0]['quantity'];
	}
	
	public function checkQuantity($id,$sl) {
		$this->db->select('quantity');
		$this->db->where('id_product', $id);
		$this->db->where('quantity >=', $sl);
		$data=$this->db->get('product')->result_array();
		if (count($data)) return 1;
		else return 0;			
	}

	public function insertForm($sex,$name,$phone,$email,$address,$note){
		$data=array('fullname'=>$name,'address'=>$address,'phone'=>$phone,'email'=>$email,'note'=>$note,'status'=>0);
		$this->db->insert('order_form', $data);
		return $this->db->insert_id();
	}

	public function insertBill($id_order,$id_product,$sl){
		$data=array('id_order'=>$id_order,'id_product'=>$id_product,'sl'=>$sl);
		$this->db->insert('bill', $data);
	}

	public function getQuantityById($id){
		$this->db->select('*');
		$this->db->where('id_product', $id);
		$data=$this->db->get('product')->result_array();
		return $data[0]['quantity'];
	}

	public function updateSL($id,$sl){
		$data=array('quantity'=>$sl);
		$this->db->where('id_product', $id);
		$this->db->update('product', $data);
	}

	public function getDataBill(){
		$this->db->select('*');
		$this->db->from('order_form');
		$this->db->join('bill', 'bill.id_order = order_form.id_order', 'left');
		$this->db->join('product', 'product.id_product = bill.id_product', 'left');
		$data=$this->db->get()->result_array();
		return $data;
	}

	public function getInforCustomer(){
		$this->db->select('*');
		$this->db->from('order_form');
		$this->db->order_by("create_date", "desc");
		$data=$this->db->get()->result_array();
		return $data;
	}

	public function getDataBillProduct($id){
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('id_order', $id);
		$this->db->join('product', 'product.id_product = bill.id_product', 'left');
		$data=$this->db->get()->result_array();
		return $data;
	}

	public function deleteBill($id){
		$this->db->where('id_order', $id);
		$this->db->delete('order_form');
		$this->db->where('id_order', $id);
		$this->db->delete('bill');
	}
	public function updateStatusBill($id,$status){
		$data=array('status'=>$status);
		$this->db->where('id_order', $id);
		$this->db->update('order_form', $data);
	}
}


/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */