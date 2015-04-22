<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->helper("cookie");
		$this->load->library('Layouts');
		$this->load->model('product_model');
	}

	public function addProduct()
	{
		if($this->input->cookie('Cart') != null){
			//JSON content to array
			$cart = json_decode($this->input->cookie('Cart'));
		}
		else{
			$cart = array();
		}

		//add productId and qty to cart array
		$cart[] = array(
						'productId' => $_POST['productId'],
						'quantity' => 1
					);

		$productIdString = '';
		if($this->input->cookie('cartProductIds') != null){
			$productIdString = $this->input->cookie('cartProductIds').$_POST['productId'].',';
		}
		else{
			$productIdString = $_POST['productId'].',';
		}

		$this->input->set_cookie('cartProductIds',$productIdString,time()+3600);
		//encode array to json
		$json_cart = json_encode($cart);
		$cart_count = array('cartCount' => count($cart));
		$this->input->set_cookie('Cart',$json_cart,time()+3600);
		$cartItemCount = count($cart);
		//echo $cartItemCount;exit;
		$this->input->set_cookie('cartCount',$cartItemCount,time()+3600);		
		//echo $this->input->cookie('cartCount',true);
		echo json_encode($cart_count);
	}

	/*
	* View Cart
	*/
	public function viewcart(){

		if($this->input->cookie('cartProductIds') != null){
			$cartProductIds = $this->input->cookie('cartProductIds');
			$cartProductIdString = rtrim ($cartProductIds, ',');

			$productIdArray = explode(',', $cartProductIdString);
			//echo '<pre>';print_r($productIdArray);
			$cartProductDetails = array();
			
			for ($i=0; $i < count($productIdArray) ; $i++) { 
				$cartProductDetails[$i] = $this->product_model->getProduct($productIdArray[$i]);
			}

			//echo '<pre>';print_r($cartProductDetails);exit;
			$this->layouts->setCartProductDetails($cartProductDetails);		
		}
		else{
			$this->layouts->setError('There are no items in this cart.');
		}


		$this->layouts->setTitle('My Cart');
		$this->__loadJsAndCSS();
		$this->layouts->view('front/cart/cart','','default');
	}

	/*
	* Remove Cart Item
	*/
	public function removeProduct(){
		$removeProductId = $_POST['removeProductId'];
		$cart = $this->input->cookie('Cart');
		$cartProducts = json_decode($cart);
		$newCartProducts = array();
		$productIdString = '';
		$totalPrice = 0;
		foreach ($cartProducts as $key => $value) {

			if($value->productId != $removeProductId){
				$newCartProducts[] = array(
											'productId' => $value->productId, 
											'quantity' => $value->quantity
										);
				$productIdString = $productIdString.$value->productId.',';
				$productDetails = $this->product_model->getProduct($value->productId);
				$totalPrice = $totalPrice + $productDetails['price']*$value->quantity;
			}
		}

		$this->input->set_cookie('cartProductIds',$productIdString,time()+3600);
		//encode array to json
		$json_cart = json_encode($newCartProducts);
		$cart_count = array(
								'cartCount' => count($newCartProducts),
								'totalPrice' => $totalPrice
							);
		$this->input->set_cookie('Cart',$json_cart,time()+3600);
		$cartItemCount = count($newCartProducts);
		//echo $cartItemCount;exit;
		$this->input->set_cookie('cartCount',$cartItemCount,time()+3600);		
		//echo $this->input->cookie('cartCount',true);
		echo json_encode($cart_count);

	}

	/*
	* Update Product
	*/
	public function updateProduct(){
		$updateProductId = $_POST['updateProductId'];
		$updatedQuantity = $_POST['updatedQuantity'];
		$cart = $this->input->cookie('Cart');
		$cartProducts = json_decode($cart);
		$newCartProducts = array();
		$productIdString = '';
		$totalPrice = 0;
		foreach ($cartProducts as $key => $value) {

			if($value->productId != $updateProductId){
				$newCartProducts[] = array(
											'productId' => $value->productId, 
											'quantity' => $value->quantity
										);
				$productIdString = $productIdString.$value->productId.',';
				$productDetails = $this->product_model->getProduct($value->productId);
				$totalPrice = $totalPrice + $productDetails['price'];
			}
			else{
				$newCartProducts[] = array(
											'productId' => $updateProductId , 
											'quantity' => $updatedQuantity
										);
				$productIdString = $productIdString.$value->productId.',';
				$productDetails = $this->product_model->getProduct($value->productId);
				$totalPrice = $totalPrice + $updatedQuantity*$productDetails['price'];
			}
		}

		//echo '<pre>';print_r($newCartProducts);exit;

		$this->input->set_cookie('cartProductIds',$productIdString,time()+3600);
		//encode array to json
		$json_cart = json_encode($newCartProducts);
		$cart_count = array(
								'cartCount' => count($newCartProducts),
								'totalPrice' => $totalPrice
							);
		$this->input->set_cookie('Cart',$json_cart,time()+3600);
		$cartItemCount = count($newCartProducts);
		//echo $cartItemCount;exit;
		$this->input->set_cookie('cartCount',$cartItemCount,time()+3600);		
		//echo $this->input->cookie('cartCount',true);
		echo json_encode($cart_count);

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