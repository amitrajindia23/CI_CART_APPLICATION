<div class="container">
	<div class="productlisttitle">
		<h1>Product Page <a class="btn btn-default" href="<?php echo site_url('cart/viewcart');?>">Cart (<span id="cartItemCount"><?php if(isset($_COOKIE['cartCount'])) echo $_COOKIE['cartCount']; else echo '0';?></span>)</a></h1>
		<hr>
	</div>	
	<div class="col-sm-12">
		<input type="hidden" name="siteUrl" id="siteUrl" value="<?php echo site_url();?>">
		<?php 
			if($this->layouts->getProductDetails()){
				$productDetails = $this->layouts->getProductDetails();
				//echo '<pre>';print_r($productDetails);exit;
		?>
					<div class="col-sm-4" style="background-color:#FFF;">
					<img style="width:250px;height:250px;" src="<?php echo base_url().$productDetails['product_image']; ?>">
				</div>
				<div class="col-sm-8" style="background-color:#FFF;color:#000000">
					<h1><?php echo $productDetails['product_name']; ?></h1>
					<p><?php echo $productDetails['company']; ?></p>
					<p><?php echo $productDetails['product_description']; ?></p>
					<p>Price: $<?php echo $productDetails['price']; ?></p>
					<?php 
						if(isset($_COOKIE['cartProductIds']) && strpos($_COOKIE['cartProductIds'],$productDetails['id']) !== false){
					?>
						<a href="javascript:void(0);" disabled="disabled" data="<?php echo $productDetails['id']; ?>" id="btnAddToCart<?php echo $productDetails['id']; ?>" class="btn btn-warning btnAddToCart" role="button">Add to cart</a>
					<?php
						}
						else{
					?>
						<a href="javascript:void(0);" data="<?php echo $productDetails['id']; ?>" id="btnAddToCart<?php echo $productDetails['id']; ?>" class="btn btn-warning btnAddToCart" role="button">Add to cart</a>
					<?php
						}
					?>
					<a class="btn btn-success" href="">Buy Now</a>				
					
				</div>
			<?php
				}
				else{
			?>
					<h1>No Product Found!</h1>
			<?php
				}
			?>
	</div>
</div>