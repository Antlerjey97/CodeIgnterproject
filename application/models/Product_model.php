<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Product_model extends CI_Model {

	/**
	 * @name string TABLE_NAME Holds the name of the table in use by this model
	 */
	const TABLE_NAME = 'product';

	/**
	 * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	 */
	const PRI_INDEX = 'id_product';

	/**
	 * Retrieves record(s) from the database
	 *
	 * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
	 *                      If associative array is given, it should fit field_name=>value pattern.
	 *                      If string, value will be used to match against PRI_INDEX
	 * @return mixed Single record if ID is given, or array of results
	 */
	public function get($where = NULL) {
		$this->db->select('*');
		$this->db->from(self::TABLE_NAME);
		if ($where !== NULL) {
			if (is_array($where)) {
				foreach ($where as $field => $value) {
					$this->db->where($field, $value);
				}
			} else {
				$this->db->where(self::PRI_INDEX, $where);
			}
		}
		$result = $this->db->get()->result_array();
		if ($result) {
			if ($where !== NULL) {
				return array_shift($result);
			} else {
				return $result;
			}
		} else {
			return false;
		}

	}

	public function getProductByCategory($id) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id_category', $id);
		$this->db->where('status', 1);
		$data = $this->db->get()->result_array();
		return $data;
	}

	/**
	 * Inserts new data into database
	 *
	 * @param Array $data Associative array with field_name=>value pattern to be inserted into database
	 * @return mixed Inserted row ID, or false if error occured
	 */
	public function insert(Array $data) {
		if ($this->db->insert(self::TABLE_NAME, $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	/**
	 * Updates selected record in the database
	 *
	 * @param Array $data Associative array field_name=>value to be updated
	 * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	 * @return int Number of affected rows by the update query
	 */
	public function update(Array $data, $where = array()) {
		if (!is_array($where)) {
			$where = array(self::PRI_INDEX => $where);
		}
		$this->db->update(self::TABLE_NAME, $data, $where);
		return $this->db->affected_rows();
	}

	/**
	 * Deletes specified record from the database
	 *
	 * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	 * @return int Number of rows affected by the delete query
	 */
	public function delete($where = array()) {
		if (!is_array($where)) {
			$where = array(self::PRI_INDEX => $where);
		}
		$this->db->delete(self::TABLE_NAME, $where);
		return $this->db->affected_rows();
	}
	public function getAllProduct() {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'category.id_category = product.id_category', 'left');
		$data = $this->db->get()->result_array();
		return $data;

	}
	public function countProduct() {
		//get total product
		return $this->db->count_all('product');
	}

	public function getProductByOffset($quantity, $offset) {
		$this->db->select('*');
		$this->db->join('category', 'category.id_category = product.id_category', 'left');
		$data = $this->db->get('product', $quantity, $offset)->result_array();
		return $data;
	}

	public function totalData($id) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.id_category', $id);
		$data = $this->db->get();
		$data = $data->result_array();
		return count($data);

	}

	public function getProductByOffsetCategory($quantity, $offset, $id) {
		$this->db->select('*');
		$this->db->where('product.id_category', $id);
		$this->db->join('category', 'category.id_category = product.id_category', 'left');
		$data = $this->db->get('product', $quantity, $offset)->result_array();
		return $data;
	}
	public function getProductByNew() {
		// get product by status new
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('status', 2);
		$data = $this->db->get()->result_array();
		return $data;
	}

	public function getLoadMore($id, $offset) {
		$this->db->select('*');
		$this->db->where('id_category', $id);
		$this->db->group_start();
		$this->db->or_where('status', 1);
		$this->db->or_where('status', 2);
		$this->db->group_end();
		$data = $this->db->get('product', 8, $offset)->result_array();
		return $data;

	}

	public function getSingleProduct($id, $id_category) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id_product', $id);
		$this->db->join('category', 'category.id_category = product.id_category', 'left');
		$data = $this->db->get()->result_array();
		return $data;
	}

	public function getProductSame($id, $id_category) {
		$this->db->select('*');
		$this->db->where('id_category', $id_category);
		$this->db->where_not_in('id_product', $id);
		$data = $this->db->get('product', 5, 0)->result_array();
		return $data;
	}
	public function getProductByCart($where) {
		$this->db->select('*');
		$this->db->from('product');
		for ($i = 0; $i < count($where); $i++) {
			$this->db->or_where('id_product', $where[$i]);
		}
		$data = $this->db->get()->result_array();
		return $data;
	}
	public function TimkiemAjax($key) {
		$this->db->select('*');
		$this->db->like('name_product', $key);
		$data = $this->db->get('product', 6, 0)->result_array();
		return $data;
	}
	public function Timkiem($key) {
		$this->db->select('*');
		$this->db->like('name_product', $key);
		$data = $this->db->get('product')->result_array();
		return $data;
	}

}

?>