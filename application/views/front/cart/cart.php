<div class="container">
	<div class="productlisttitle">
		<h1>Cart <a class="btn btn-default" href="<?php echo site_url('cart/viewcart');?>">Cart (<span id="cartItemCount"><?php if(isset($_COOKIE['cartCount'])) echo $_COOKIE['cartCount']; else echo '0';?></span>)</a></h1>
		<hr>
		<?php
			$cart = json_decode($this->input->cookie('Cart'));
			$cartProductQuantityArray = array();
			for ($i=0; $i < count($cart) ; $i++) { 
				$cartProductQuantityArray[$cart[$i]->productId] = $cart[$i];
			}
			//echo '<pre>';print_r($cartProductQuantityArray);
		?>
	</div>	
	<div class="col-sm-12">
		<input type="hidden" name="siteUrl" id="siteUrl" value="<?php echo site_url();?>">
		<?php 
			if($this->layouts->getError()){
		?>	    	
			    <h1><?php echo $this->layouts->getError(); ?><h1>
		<?php
			}
		?>
		<?php 
			if($this->layouts->getCartProductDetails())	{
		?>
				<table class="table table-bordered" style="background-color:#FFF;">
				        <thead>
				            <tr>
				                <th>Image</th>
				                <th>Item</th>
				                <th>Qty</th>
				                <th>Price</th>
				                <th>Delivery Details</th>				               
				            </tr>
				        </thead>
				        <tbody>
		<?php
				$totalAmmount = 0;
				foreach ($this->layouts->getCartProductDetails() as $key => $value) {
					$quantity = 1;
					if(array_key_exists($value['id'], $cartProductQuantityArray)){
						$quantity = $cartProductQuantityArray[$value['id']]->quantity;
					}
					$totalAmmount = $totalAmmount + $value['price']*$quantity;
		?>				
		            <tr id="rowId_<?php echo $value['id']; ?>">
		                <td>
		                	<img src="<?php echo base_url().$value['product_image'];?>" style="height:150px;width:150px;">
		                </td>
		                <td>
		                	<p><?php echo $value['product_name'];?></p>
		                	<p><?php echo $value['company'];?></p>
		                </td>
		                <td>
		                	<input type="text" name="quantity_<?php echo $value['id']; ?>" id="quantity_<?php echo $value['id']; ?>" value="<?php echo $quantity;?>">
		                	<a class="btn btn-warning btn-xs updatebutton" data="<?php echo $value['id']; ?>" title="Update this Item">Update</a>
		                	<a class="btn btn-danger btn-xs delbutton" data="<?php echo $value['id']; ?>" title="Delete this Item">Remove</a>
		                </td>
		                <td>$<?php echo $value['price'];?></td>
		                <td>7 working days</td>
		            </tr>
				            
				       
		<?php		
				}
		?>
					</tbody>
					<tfoot>
						<tr>
							<td><strong>Total</strong></td>
							<td id="totalAmmount"><strong>$<?php echo $totalAmmount; ?></strong></td>
						</tr>
					</tfoot>
				</table>
		<?php
		
			}
		?>
	</div>
</div>