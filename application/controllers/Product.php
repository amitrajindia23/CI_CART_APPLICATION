<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model("product_model");
		$this->load->helper('Url');
		$this->load->helper("Cookie");
		$this->load->library("Layouts");
	}

	/*
	* List Product
	*/
	public function index(){

		$this->layouts->setTitle('Product List');
		$this->__loadJsAndCSS();
		//echo $this->input->cookie('cartCount');
		$productlist = $this->product_model->getProductList();
		//echo '<pre>';print_r($productlist);exit;
		$this->layouts->setProductData($productlist);
		$this->layouts->view('front/product/productlist','','default');
	}

	/*
	* see product
	*/
	public function show(){
		$this->layouts->setTitle('Product Page');
		$this->__loadJsAndCSS();
		$productId = $this->uri->segment(3);
		$productDetails = $this->product_model->getProduct($productId);
		//echo '<pre>';print_r($productDetails);exit;
		$this->layouts->setProductDetails($productDetails);
		$this->layouts->view('front/product/productpage','','default');
	}

	/*
	* Function to load Js and Css files
	*/
	function __loadJsAndCSS(){

		$this->layouts->add_include('assets/css/bootstrap.min.css')
						->add_include('assets/css/bootstrap-responsive.min.css')       			  	
						->add_include('assets/css/jquery-ui.css')       			  	
						->add_include('assets/css/Login_style.css')       			  	
					  	->add_include('assets/js/jquery-1.11.2.min.js')
					  	->add_include('assets/js/jquery-migrate-1.2.1.min.js')
						->add_include('assets/js/jquery-ui.js')
						->add_include('assets/js/custom.js')
						->add_include('assets/js/bootstrap.min.js');
	}
}