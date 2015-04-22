<?php 
class Product_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
		//$CI =& get_instance();
		$this->load->library("Session");
	}

	/*
	* Get All Product list
	*/
	public function getProductList(){
		$this->db->select("ci_products.*");
		$this->db->from('ci_products');
        $this->db->order_by('ci_products.id','desc');
		$query = $this->db->get();

		//echo $this->db->last_query();
 		$productList = array();
        if ($query->num_rows() > 0) {
            $productList = $query->result_array();
        }
        return $productList;
	}

	/*
	* Get Product details by productId
	*/
	public function getProduct($productId){

		$this->db->select("ci_products.*");
		$this->db->where('id',$productId);
		$this->db->from('ci_products');
		$query = $this->db->get();
		$productDetails = array();
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			$productDetails = $data[0];
		}
		//echo '<pre>';print_r($productDetails);exit;
		return $productDetails;
	}

}