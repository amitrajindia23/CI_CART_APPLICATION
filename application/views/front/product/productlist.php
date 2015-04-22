<div class="container" id="product-list">
	<div class="productlisttitle">
		<h1>Product List <a class="btn btn-default" href="<?php echo site_url('cart/viewcart');?>">Cart (<span id="cartItemCount"><?php if(isset($_COOKIE['cartCount'])) echo $_COOKIE['cartCount']; else echo '0';?></span>)</a></h1>
		<hr>
		<?php echo $this->input->cookie('cartProductIds'); ?>
	</div>	
	<div class="col-sm-12">
		<input type="hidden" name="siteUrl" id="siteUrl" value="<?php echo site_url();?>">
		<?php 

			foreach ($this->layouts->getProductData() as $key => $value) {
		?>
			<div class="col-xs-18 col-sm-4 col-md-3">
				<div class="productbox">
					<div class="imgthumb img-responsive">
						<!-- <img src="http://lorempixel.com/250/250/business/?ab=1df"> -->
						<img style="" src="<?php echo base_url().$value['product_image']; ?>">
					</div>
					<div class="caption">
						<h5><?php echo $value['product_name'].' - '.$value['company'];?></h5>
						<span class="btn btn-default btn-xs pull-right">$<?php echo $value['price']; ?></span> 
						<?php 
							if(isset($_COOKIE['cartProductIds']) && strpos($_COOKIE['cartProductIds'],$value['id']) !== false){
						?>
							<a href="javascript:void(0);" disabled="disabled" data="<?php echo $value['id'] ?>" id="btnAddToCart<?php echo $value['id'] ?>" class="btn btn-info btn-xs btnAddToCart" role="button">Add to cart</a>
						<?php
							}
							else{
						?>
							<a href="javascript:void(0);" data="<?php echo $value['id'] ?>" id="btnAddToCart<?php echo $value['id'] ?>" class="btn btn-info btn-xs btnAddToCart" role="button">Add to cart</a>
						<?php
							}
						?>
						
						<a href="<?php echo site_url('product/show/'.$value["id"]);?>" class="btn btn-default btn-xs" role="button">See Product</a>
					</div>
				</div>
			</div>
		<?php
			}
		?>
	   
		
		<!-- <div class="col-xs-18 col-sm-4 col-md-3">
			<div class="productbox">
				<div class="imgthumb img-responsive">
					<img src="http://lorempixel.com/250/250/business/?a=7">
				</div>
				<div class="caption">
					<h5>Thumbnail label</h5>
                  	<s class="text-muted">$2.29</s> <b class="finalprice">$1.2</b> from <b>Amazon</b>
                  	<a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="glyphicon glyphicon-zoom-in"></i></a>
                    <p>
                      <button type="button" class="btn btn-success btn-md btn-block">Get Offer</button>
                    </p>
              	</div>
              	<div class="saleoffrate">
                  <b>90%</b><br>OFF
              	</div>
			</div>
		</div>		 -->
	</div><!--/row-->
</div>