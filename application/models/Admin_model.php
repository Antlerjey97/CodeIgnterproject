<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }
    public function confirm_account($user,$pass){
      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('username', $user);
      $this->db->where('password', $pass);
      $data=$this->db->get()->result_array();
      $data=(count($data)!=0)?$data:0;
      return $data;
    }
    public function checkUser($username){
        $this->db->select('*');
        $this->db->where('username', $username);
        $data=$this->db->get('admin')->result_array();
        $status=(count($data)>0)?false:true;
        return $status;
    }
    public function addAdmin($username,$password,$fullname,$email,$rank,$status){
        $data=array('username'=>$username,'password'=>$password,'fullname'=>$fullname,'rank'=>$rank,'email'=>$email,'status'=>$status);
        $this->db->insert('admin', $data);
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */