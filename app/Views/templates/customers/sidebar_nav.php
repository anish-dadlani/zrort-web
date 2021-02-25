<!-- Cart Sidebar Offset Start-->
<div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
	<div class="bs-canvas-header side-cart-header p-3 ">
		<div class="d-inline-block  main-cart-title">My Cart <span id="cart_count">(0 Items)</span></div>
		<button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
	</div> 
	<div class="bs-canvas-body">
		<div class="cart-top-total">
			<!-- <div class="cart-total-dil">
				<h4>Zrort Super Market</h4>
				 <span>$34</span> 
			</div> -->
			<div class="cart-total-dil pt-2">
				<h4>Delivery Charges</h4>
				<span><?php $charges=0; $business_ids = array(); 
				if(isset($_SESSION['cart'])){ 
					foreach($_SESSION['cart'] as $key => $item): 
						$business_ids[] = $item['bussiness_id'];
                        $business_ids = array_unique($business_ids);
					endforeach;
					foreach($business_ids as $id){
                        $charges = $charges + get_business_delivery_charges($id);
                    }
				}
					echo $charges;
				?></span>
			</div>
		</div>
		<div class="side-cart-items">
		<?php $sumTotal = $sumSaving = $finaltotal = 0; 
		if(isset($_SESSION['cart'])) {
			foreach($_SESSION['cart'] as $key => $item): 
				if(isset($item['discount_amount'])){
					$sumTotal = $sumTotal + ($item['discount_amount'] * $item['quantity']); 
					$sumSaving = $sumSaving + (($item['unit_price'] - $item['discount_amount'])  * $item['quantity']);
				}else{
					$sumTotal = $sumTotal + ($item['unit_price'] * $item['quantity']);
				} ?>
			<div class="cart-item">
				<div class="cart-product-img">
					<img src="<?= base_url().'/'.$item['image_path']; ?>" alt="">
					<?php if(isset($item['discount_amount']) && isset($item['discount_percent'])){?>
						<div class="offer-badge"><?= $item['discount_percent'].'% OFF' ?></div>
					<?php } ?>
				</div>
				<div class="cart-text">
					<h4 id="product_title"><?= $item['name'] ?></h4>
					<!-- <div class="cart-radio">
						 <ul class="kggrm-now">
							<li>
								<input type="radio" id="a1" name="cart1">
								<label for="a1">0.50</label>
							 </li>
						</ul> 
					</div> -->
					<div class="qty-group">
						<div class="quantity buttons_added">
							<input type="button" id="minus" onclick="minus(<?=$item['pk_id']?>)" value="-" class="minus minus-btn">
							<input type="number" id="number" step="1" name="quantity" value="1" class="input-text qty text">
							<input type="button" id="plus" onclick="plus(<?=$item['pk_id']?>)" value="+" class="plus plus-btn">
						</div>
						<div class="cart-item-price">
						<?php if(isset($item['discount_amount'])){?>
								<?= 'Rs '.$item['discount_amount'] ?><span><?= $item['unit_price']?></span></div>
						<?php }else { ?>
								<?= 'Rs '.$item['unit_price'] ?> </div>
						<?php }?>
					</div>
					<button type="button" class="cart-close-btn" onclick="removeFromCart(<?=$item['pk_id']?>)"><i class="uil uil-multiply"></i></button>
				</div>
			</div>
			<?php endforeach; 
			$finaltotal = $sumTotal + $charges;
		}?>
		</div>
	</div>
	<div class="bs-canvas-footer">
		<div class="cart-total-dil saving-total ">
			<h4>Total Saving</h4>
			<span id="sumSaving"><?= 'Rs '.$sumSaving ?></span>
		</div>
		<div class="main-total-cart">
			<h2>Total</h2>
			<span id="finalTotal"><?= 'Rs '.$finaltotal ?></span>
		</div>
		<div class="checkout-cart">
			<a href="#" class="promo-code">Have a promocode?</a>
			<a id="checkout" href="<?= base_url('orders/checkout')?>" class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
		</div>
	</div>
</div>
<!-- Cart Sidebar Offsetl End-->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>